;(function($){
'use strict';
function throttle(func, wait, options) {
  var context, args, result;
  var timeout = null;
  // ä¸Šæ¬¡æ‰§è¡Œæ—¶é—´ç‚¹
  var previous = 0;
  if (!options) options = {};
  // å»¶è¿Ÿæ‰§è¡Œå‡½æ•°
  var later = function () {
    // è‹¥è®¾å®šäº†å¼€å§‹è¾¹ç•Œä¸æ‰§è¡Œé€‰é¡¹ï¼Œä¸Šæ¬¡æ‰§è¡Œæ—¶é—´å§‹ç»ˆä¸º0
    previous = options.leading === false ? 0 : new Date().getTime();
    timeout = null;
    result = func.apply(context, args);
    if (!timeout) context = args = null;
  };
  return function () {
    var now = new Date().getTime();
    // é¦–æ¬¡æ‰§è¡Œæ—¶ï¼Œå¦‚æžœè®¾å®šäº†å¼€å§‹è¾¹ç•Œä¸æ‰§è¡Œé€‰é¡¹ï¼Œå°†ä¸Šæ¬¡æ‰§è¡Œæ—¶é—´è®¾å®šä¸ºå½“å‰æ—¶é—´ã€‚
    if (!previous && options.leading === false) previous = now;
    // å»¶è¿Ÿæ‰§è¡Œæ—¶é—´é—´éš”
    var remaining = wait - (now - previous);
    context = this;
    args = arguments;
    // å»¶è¿Ÿæ—¶é—´é—´éš”remainingå°äºŽç­‰äºŽ0ï¼Œè¡¨ç¤ºä¸Šæ¬¡æ‰§è¡Œè‡³æ­¤æ‰€é—´éš”æ—¶é—´å·²ç»è¶…è¿‡ä¸€ä¸ªæ—¶é—´çª—å£
    // remainingå¤§äºŽæ—¶é—´çª—å£waitï¼Œè¡¨ç¤ºå®¢æˆ·ç«¯ç³»ç»Ÿæ—¶é—´è¢«è°ƒæ•´è¿‡
    if (remaining <= 0 || remaining > wait) {
      clearTimeout(timeout);
      timeout = null;
      previous = now;
      result = func.apply(context, args);
      if (!timeout) context = args = null;
      //å¦‚æžœå»¶è¿Ÿæ‰§è¡Œä¸å­˜åœ¨ï¼Œä¸”æ²¡æœ‰è®¾å®šç»“å°¾è¾¹ç•Œä¸æ‰§è¡Œé€‰é¡¹
    } else if (!timeout && options.trailing !== false) {
      timeout = setTimeout(later, remaining);
    }
    return result;
  };
}

var isSafari = function () {
  var ua = navigator.userAgent.toLowerCase();
  if (ua.indexOf('safari') !== -1) {
    return ua.indexOf('chrome') > -1 ? false : true;
  }
}();

var settings = {
  readOnly: false,
  limitCount: Infinity,
  input: '<input type="text" maxLength="20" placeholder="Search...">',
  data: [],
  searchable: true,
  searchNoData: '<li style="color:#ddd">No Results</li>',
  choice: function () { }
};

var KEY_CODE = {
  up: 38,
  down: 40,
  enter: 13
};

// åˆ›å»ºæ¨¡æ¿
function createTemplate() {
  var isLabelMode = this.isLabelMode;
  var searchable = this.config.searchable;
  var templateSearch = searchable ? '<span class="dropdown-search">' + this.config.input + '</span>' : '';

  return isLabelMode ? '<div class="dropdown-display-label"><div class="dropdown-chose-list">' + templateSearch + '</div></div><div class="dropdown-main">{{ul}}</div>' : '<a href="javascript:;" class="dropdown-display"><span class="dropdown-chose-list"></span></a><div class="dropdown-main">' + templateSearch + '{{ul}}</div>';
}

// è¶…å‡ºé™åˆ¶æç¤º
function maxItemAlert() {
  var _dropdown = this;
  var _config = _dropdown.config;
  var $el = _dropdown.$el;
  var $alert = $el.find('.dropdown-maxItem-alert');
  clearTimeout(_dropdown.maxItemAlertTimer);

  if ($alert.length === 0) {
    $alert = $('<div class="dropdown-maxItem-alert">\u6700\u591A\u53EF\u9009\u62E9' + _config.limitCount + '\u4E2A</div>');
  }

  $el.append($alert);
  _dropdown.maxItemAlertTimer = setTimeout(function () {
    $el.find('.dropdown-maxItem-alert').remove();
  }, 1000);
}

// select-option è½¬ ul-li
function selectToDiv(str) {
  var result = str || '';
  // ç§»é™¤selectæ ‡ç­¾
  result = result.replace(/<select[^>]*>/gi, '<ul>').replace('</select', '</ul');
  // ç§»é™¤ optgroup ç»“æŸæ ‡ç­¾
  result = result.replace(/<\/optgroup>/gi, '');
  result = result.replace(/<optgroup[^>]*>/gi, function (matcher) {
    var groupName = /label="(.[^"]*)"(\s|>)/.exec(matcher);
    var groupId = /data\-group\-id="(.[^"]*)"(\s|>)/.exec(matcher);
    return '<li class="dropdown-group" data-group-id="' + (groupId[1] || '') + '">' + (groupName[1] || '') + '</li>';
  });
  result = result.replace(/<option(.*?)<\/option>/gi, function (matcher) {
    var value = /value="(.[^"]*)"(\s|>)/.exec(matcher);
    var name = />(.*)<\//.exec(matcher);
    // å¼ºåˆ¶è¦æ±‚htmlä¸­ä½¿ç”¨selected/disabledï¼Œè€Œä¸æ˜¯selected="selected","disabled="disabled"
    var isSelected = matcher.indexOf('selected') > -1 ? true : false;
    var isDisabled = matcher.indexOf('disabled') > -1 ? true : false;

    return '<li ' + (isDisabled ? ' disabled' : ' tabindex="0"') + '  \n                                    data-value="' + (value[1] || '') + '" \n                                    class="dropdown-option ' + (isSelected ? 'dropdown-chose' : '') + '">' + (name[1] || '') + '</li>';
  });

  return result;
}

// object-data è½¬ select-option
function objectToSelect(data) {
  var map = {};
  var result = '';
  var name = [];
  var selectAmount = 0;

  if (!data || !data.length) {
    return false;
  }

  $.each(data, function (index, val) {
    // disable æƒé‡é«˜äºŽ selected
    var hasGroup = val.groupId;
    var isDisabled = val.disabled ? ' disabled' : '';
    var isSelected = val.selected && !isDisabled ? ' selected' : '';

    var temp = '<option' + isDisabled + isSelected + ' value="' + val.id + '">' + val.name + '</option>';

    if (isSelected) {
      name.push('<span class="dropdown-selected">' + val.name + '<i class="del" data-id="' + val.id + '"></i></span>');
      selectAmount++;
    }

    // åˆ¤æ–­æ˜¯å¦æœ‰åˆ†ç»„
    if (hasGroup) {
      if (map[val.groupId]) {
        map[val.groupId] += temp;
      } else {
        //  &janking& just a separator
        map[val.groupId] = val.groupName + '&janking&' + temp;
      }
    } else {
      map[index] = temp;
    }
  });

  $.each(map, function (index, val) {
    var option = val.split('&janking&');
    // åˆ¤æ–­æ˜¯å¦æœ‰åˆ†ç»„
    if (option.length === 2) {
      var groupName = option[0];
      var items = option[1];
      result += '<optgroup label="' + groupName + '" data-group-id="' + index + '">' + items + '</optgroup>';
    } else {
      result += val;
    }
  });

  return [result, name, selectAmount];
}

// select-option è½¬ object-data
// 
function selectToObject(el) {
  var $select = el;
  var result = [];

  function readOption(key, el) {
    var $option = $(el);

    this.id = $option.prop('value');
    this.name = $option.text();
    this.disabled = $option.prop('disabled');
    this.selected = $option.prop('selected');
  }

  $.each($select.children(), function (key, el) {
    var tmp = {};
    var tmpGroup = {};
    var $el = $(el);

    if (el.nodeName === 'OPTGROUP') {
      tmpGroup.groupId = $el.data('groupId');
      tmpGroup.groupName = $el.attr('label');
      $.each($el.children(), $.proxy(readOption, tmp));
      $.extend(tmp, tmpGroup);
    } else {
      $.each($el, $.proxy(readOption, tmp));
    }

    result.push(tmp);
  });

  return result;
}

var action = {
  show: function show(event) {
    event.stopPropagation();
    var _dropdown = this;
    $(document).trigger('click.dropdown');
    _dropdown.$el.toggleClass('active');
  },
  search: throttle(function (event) {

    var _dropdown = this;
    var _config = _dropdown.config;
    var $el = _dropdown.$el;
    var $input = $(event.target);
    var intputValue = $input.val();
    var data = _dropdown.config.data;
    var result = [];

    if (event.keyCode > 36 && event.keyCode < 41) {
      return;
    }

    $.each(data, function (key, value) {
      if (value.name.toLowerCase().indexOf(intputValue) > -1 || '' + value.id === '' + intputValue) {
        result.push(value);
      }
    });

    $el.find('ul').html(selectToDiv(objectToSelect(result)[0]) || _config.searchNoData);
  }, 300),
  control: function control(event) {
    var keyCode = event.keyCode;
    var KC = KEY_CODE;
    var index = 0;
    var direct;
    var itemIndex;
    var $items;
    if (keyCode === KC.down || keyCode === KC.up) {

      // æ–¹å‘
      direct = keyCode === KC.up ? -1 : 1;
      $items = this.$el.find('[tabindex]');
      itemIndex = $items.index($(document.activeElement));

      // åˆå§‹
      if (itemIndex === -1) {
        index = direct + 1 ? -1 : 0;
      } else {
        index = itemIndex;
      }

      // ç¡®è®¤ä½åº
      index = index + direct;

      // æœ€åŽä½å¾ªçŽ¯
      if (index === $items.length) {
        index = 0;
      }

      $items.eq(index).focus();
      event.preventDefault();
    }
  },
  multiChoose: function multiChoose(event) {
    var _dropdown = this;
    var _config = _dropdown.config;
    var $select = _dropdown.$select;
    var $target = $(event.target);
    var value = $target.data('value');
    var hasSelected = $target.hasClass('dropdown-chose');

    if (hasSelected) {
      $target.removeClass('dropdown-chose');
      _dropdown.selectAmount--;
    } else {
      if (_dropdown.selectAmount < _config.limitCount) {
        $target.addClass('dropdown-chose');
        _dropdown.selectAmount++;
      } else {
        maxItemAlert.call(_dropdown);
        return false;
      }
    }

    _dropdown.name = [];

    $.each(_config.data, function (key, item) {
      if ('' + item.id === '' + value) {
        item.selected = hasSelected ? false : true;
      }
      if (item.selected) {
        _dropdown.name.push('<span class="dropdown-selected">' + item.name + '<i class="del" data-id="' + item.id + '"></i></span>');
      }
    });
    $select.find('option[value="' + value + '"]').prop('selected', hasSelected ? false : true);

    _dropdown.$choseList.find('.dropdown-selected').remove();
    _dropdown.$choseList.prepend(_dropdown.name.join(''));
    _config.choice.call(_dropdown, event);
  },
  singleChoose: function singleChoose(event) {
    var _dropdown = this;
    var _config = _dropdown.config;
    var $el = _dropdown.$el;
    var $select = _dropdown.$select;
    var $target = $(event.target);
    var value = $target.data('value');
    var hasSelected = $target.hasClass('dropdown-chose');

    _dropdown.name = [];

    if ($target.hasClass('dropdown-chose')) {
      return false;
    }

    $el.removeClass('active').find('li').not($target).removeClass('dropdown-chose');

    $target.toggleClass('dropdown-chose');
    $.each(_config.data, function (key, item) {
      // id æœ‰å¯èƒ½æ˜¯æ•°å­—ä¹Ÿæœ‰å¯èƒ½æ˜¯å­—ç¬¦ä¸²ï¼Œå¼ºåˆ¶å…¨ç­‰æœ‰å¼Šç«¯ 2017-03-20 22:19:21
      item.selected = false;
      if ('' + item.id === '' + value) {
        item.selected = hasSelected ? 0 : 1;
        if (item.selected) {
          _dropdown.name.push('<span class="dropdown-selected">' + item.name + '<i class="del" data-id="' + item.id + '"></i></span>');
        }
      }
    });

    $select.find('option[value="' + value + '"]').prop('selected', true);

    _dropdown.name.push('<span class="placeholder">' + _dropdown.placeholder + '</span>');

    _dropdown.$choseList.html(_dropdown.name.join(''));
  },
  del: function del(event) {
    var _dropdown = this;
    var $target = $(event.target);
    var id = $target.data('id');
    // 2017-03-23 15:58:50 æµ‹è¯•
    // 10000æ¡æ•°æ®æµ‹è¯•åˆ é™¤ï¼Œè€—æ—¶ ~3ms
    $.each(_dropdown.name, function (key, value) {
      if (value.indexOf('data-id="' + id + '"') !== -1) {
        _dropdown.name.splice(key, 1);
        return false;
      }
    });

    $.each(_dropdown.config.data, function (key, item) {
      if (item.id === id) {
        item.selected = false;
        return false;
      }
    });

    _dropdown.selectAmount--;
    _dropdown.$el.find('[data-value="' + id + '"]').removeClass('dropdown-chose');
    _dropdown.$el.find('[value="' + id + '"]').prop('selected', false).removeAttr('selected');
    $target.closest('.dropdown-selected').remove();

    return false;
  }
};

function Dropdown(options, el) {
  this.$el = $(el);
  this.$select = this.$el.find('select');
  this.placeholder = this.$select.attr('placeholder');
  this.config = options;
  this.name = [];
  this.isSingleSelect = !this.$select.prop('multiple');
  this.selectAmount = 0;
  this.maxItemAlertTimer = null;
  this.isLabelMode = this.config.multipleMode === 'label';
  this.init();
}

Dropdown.prototype = {
  init: function init() {
    var _this = this;
    var _config = _this.config;
    var $el = _this.$el;
    var openHandle = isSafari ? 'click.iui-dropdown' : 'focus.iui-dropdown';

    //  åˆ¤æ–­dropdownæ˜¯å¦å•é€‰ï¼Œæ˜¯å¦tokenæ¨¡å¼
    $el.addClass(_this.isSingleSelect ? 'dropdown-single' : _this.isLabelMode ? 'dropdown-multiple-label' : 'dropdown-multiple');

    if (_config.data.length === 0) {
      _config.data = selectToObject(_this.$select);
    }

    var processResult = objectToSelect(_config.data);

    _this.name = processResult[1];
    _this.selectAmount = processResult[2];
    _this.$select.html(processResult[0]);
    _this.renderSelect();

    $el.on('click.iui-dropdown', function (event) {
      event.stopPropagation();
    });

    // show
    if (_this.isLabelMode) {

      $el.on('click.iui-dropdown', '.dropdown-display-label', function () {
        $el.find('input').focus();
      });

      $el.on('click.iui-dropdown', '.del', $.proxy(action.del, _this));
      $el.on('focus.iui-dropdown', 'input', $.proxy(action.show, _this));
      $el.on('keydown.iui-dropdown', 'input', function (event) {
        if (event.keyCode === 8 && this.value === '' && _this.name.length) {
          $el.find('.del').eq(-1).trigger('click');
        }
      });
    } else {
      $el.on(openHandle, '.dropdown-display', $.proxy(action.show, _this));
    }

    // æœç´¢
    $el.on('keyup.iui-dropdown', 'input', $.proxy(action.search, _this));

    // æŒ‰ä¸‹enteré”®è®¾ç½®token
    $el.on('keyup.iui-dropdown', function (event) {
      var keyCode = event.keyCode;
      var KC = KEY_CODE;
      if (keyCode === KC.enter) {
        $.proxy(_this.isSingleSelect ? action.singleChoose : action.multiChoose, _this, event)();
      }
    });

    // æŒ‰ä¸‹ä¸Šä¸‹é”®åˆ‡æ¢token
    $el.on('keydown.iui-dropdown', $.proxy(action.control, _this));

    $el.on('click.iui-dropdown', '[tabindex]', $.proxy(_this.isSingleSelect ? action.singleChoose : action.multiChoose, _this));
  },

  // æ¸²æŸ“ select ä¸º dropdown
  renderSelect: function renderSelect() {
    var _this = this;
    var $el = _this.$el;
    var $select = _this.$select;
    var template = createTemplate.call(_this).replace('{{ul}}', selectToDiv($select.prop('outerHTML')));

    $el.append(template).find('ul').removeAttr('style class');

    _this.$choseList = $el.find('.dropdown-chose-list');

    if (!_this.isLabelMode) {
      _this.$choseList.html($('<span class="placeholder"></span>').text(_this.placeholder));
    }

    _this.$choseList.prepend(_this.name.join(''));
  }
};

$(document).on('click.dropdown', function () {
  $('.dropdown-single,.dropdown-multiple,.dropdown-multiple-label').removeClass('active');
});

$.fn.dropdown = function (options) {
  this.each(function (index, el) {
    $(el).data('iui-dropdown', new Dropdown($.extend(true, {}, settings, options), el));
  });
  return this;
}
})(jQuery);