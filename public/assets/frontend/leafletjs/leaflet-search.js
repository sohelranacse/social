/*!
 * LeafletSearch 1.0.1
 * (c) 2020 Sjaak Priester, Amsterdam
 * MIT License
 * https://github.com/sjaakp/leaflet-search
 * https://sjaakpriester.nl
 */
!(function () {
    "use strict";
    !(function (t) {
        if (t && "undefined" != typeof window) {
            var e = document.createElement("style");
            e.setAttribute("type", "text/css"), (e.innerHTML = t), document.head.appendChild(e);
        }
    })(
        ".geo-search{box-shadow:0 1px 5px rgba(0,0,0,.65)}.geo-search svg{width:1.2em}.geo-search input{transition:width .4s;width:0;padding:2px 0;border:solid #888;border-width:1px 0;outline:0}.geo-search.open input{width:15em;padding:2px 2px;border-width:1px;border-top-left-radius:4px;border-bottom-left-radius:4px}.geo-search button{border:1px solid #888;border-top-right-radius:4px;border-bottom-right-radius:4px;padding:2px 6px}.geo-search button:hover{background-color:#ddd}"
    ),
        (L.geo = {
            Geocoder: L.Class.extend({
                initialize: function (t, e) {
                    (this._map = t), L.setOptions(this, e);
                },
                constructUrl: function (t, e) {
                    void 0 === e && (e = {});
                    var n = Object.assign({}, this.options, e),
                        o = new URL(t);
                    for (var r in n) o.searchParams.set(r, n[r]);
                    return o;
                },
                fetchJson: function (t) {
                    return fetch(t.href).then(function (t) {
                        return t.json();
                    });
                },
                placeMarker: function (t, e, n) {
                    this._map.placeMarker(t, e, n);
                },
                fire: function (t) {
                    this._map.fire(t);
                },
                suggest: function (t, e) {},
                lookup: function (t) {},
            }),
        }),
        (L.geo.Nominatim = L.geo.Geocoder.extend({
            url: "https://nominatim.openstreetmap.org/",
            mark: function (t) {
                var e = L.latLng(t.lat, t.lon),
                    n = t.boundingbox,
                    o = L.latLngBounds([n[0], n[2]], [n[1], n[3]]);
                this.placeMarker(e, o, t);
            },
            search: function (t) {
                var e = this.constructUrl(this.url + "search", { format: "json", q: t });
                return this.fetchJson(e);
            },
            suggest: function (t, e) {
                var n = this;
                this.search(t)
                    .then(function (t) {
                        e.innerHTML = t.reduce(function (t, e) {
                            return t + '<option data-id="' + e.osm_type.charAt(0).toUpperCase() + e.osm_id + '">' + e.display_name + "</option>";
                        }, "");
                    })
                    .catch(function (t) {
                        return n.fire(t);
                    });
            },
            lookup: function (t) {
                var e = this,
                    n = this.constructUrl(this.url + "reverse", { format: "json", osm_type: t.charAt(0), osm_id: t.slice(1) });
                this.fetchJson(n)
                    .then(function (t) {
                        return e.mark(t);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
            geocode: function (t) {
                var e = this;
                this.search(t)
                    .then(function (t) {
                        if (t.length < 1) throw "notfound";
                        return t[0];
                    })
                    .then(function (t) {
                        return e.mark(t);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
        })),
        (L.geo.GeoNames = L.geo.Geocoder.extend({
            url: "http://api.geonames.org/search",
            fetchGeonames: function (t) {
                return this.fetchJson(t).then(function (t) {
                    var e = t.geonames;
                    if (!e || e.length < 1) throw "notfound";
                    return e;
                });
            },
            mark: function (t) {
                var e = L.latLng(t.lat, t.lng),
                    n = t.bbox,
                    o = L.latLngBounds([n.north, n.west], [n.south, n.east]);
                this.placeMarker(e, o, t);
            },
            suggest: function (t, e) {
                var n = this,
                    o = this.constructUrl(this.url, { q: t, type: "json", style: "short" });
                this.fetchGeonames(o)
                    .then(function (t) {
                        e.innerHTML = t.reduce(function (t, e) {
                            return t + '<option data-id="' + e.geonameId + '">' + e.name + "&emsp;" + e.countryCode + "</option>";
                        }, "");
                    })
                    .catch(function (t) {
                        return n.fire(t);
                    });
            },
            lookup: function (t) {
                var e = this,
                    n = this.constructUrl("http://api.geonames.org/getJSON", { geonameId: t });
                this.fetchJson(n)
                    .then(function (t) {
                        return e.mark(t);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
            geocode: function (t) {
                var e = this,
                    n = this.constructUrl(this.url, { q: t, inclBbox: !0 });
                this.fetchGeonames(n)
                    .then(function (t) {
                        return t.shift();
                    })
                    .then(function (t) {
                        return e.mark(t);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
        })),
        (L.geo.Here = L.geo.Geocoder.extend({
            mark: function (t) {
                var e = t.displayPosition,
                    n = L.latLng(e.latitude, e.longitude),
                    o = t.mapView,
                    r = o.topLeft,
                    i = o.bottomRight,
                    s = L.latLngBounds([r.latitude, i.longitude], [i.latitude, r.longitude]);
                this.placeMarker(n, s, t);
            },
            fetchData: function (t) {
                var e = this;
                t.jsonattributes = 1;
                var n = this.constructUrl("https://geocoder.ls.hereapi.com/6.2/geocode.json", t);
                this.fetchJson(n)
                    .then(function (t) {
                        return t.response.view.shift().result.shift();
                    })
                    .then(function (t) {
                        return e.mark(t.location);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
            suggest: function (t, e) {
                var n = this,
                    o = this.constructUrl("https://autocomplete.geocoder.ls.hereapi.com/6.2/suggest.json", { query: t });
                this.fetchJson(o)
                    .then(function (t) {
                        return t.suggestions;
                    })
                    .then(function (t) {
                        e.innerHTML = t.reduce(function (t, e) {
                            return t + '<option data-id="' + e.locationId + '">' + e.label + "</option>";
                        }, "");
                    })
                    .catch(function (t) {
                        return n.fire(t);
                    });
            },
            lookup: function (t) {
                this.fetchData({ locationid: t });
            },
            geocode: function (t) {
                this.fetchData({ searchtext: t });
            },
        })),
        (L.geo.TomTom = L.geo.Geocoder.extend({
            url: "https://api.tomtom.com/search/2/geocode/",
            suggestions: [],
            datalist: null,
            mark: function (t) {
                var e = t.position,
                    n = L.latLng(e.lat, e.lon),
                    o = t.viewport,
                    r = o.topLeftPoint,
                    i = o.btmRightPoint,
                    s = L.latLngBounds([r.lat, i.lon], [i.lat, r.lon]);
                this.placeMarker(n, s, t);
            },
            fetchResults: function (t, e) {
                void 0 === e && (e = {});
                var n = encodeURIComponent(t),
                    o = this.constructUrl("" + this.url + n + ".json", e);
                return this.fetchJson(o).then(function (t) {
                    if (t.summary.numResults < 1) throw "notfound";
                    return t.results;
                });
            },
            suggest: function (t, e) {
                var n = this;
                (this.datalist = e),
                    this.fetchResults(t, { typeahead: !0 })
                        .then(function (t) {
                            (n.suggestions = t),
                                (e.innerHTML = t.reduce(function (t, e) {
                                    return t + '<option data-id="' + e.id + '">' + e.address.freeformAddress + "</option>";
                                }, ""));
                        })
                        .catch(function (t) {
                            return n.fire(t);
                        });
            },
            lookup: function (t) {
                var e = this.suggestions.find(function (e) {
                    return e.id === t;
                });
                e && this.mark(e);
            },
            geocode: function (t) {
                var e = this;
                this.fetchResults(t)
                    .then(function (t) {
                        return t.shift();
                    })
                    .then(function (t) {
                        return e.mark(t);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
        })),
        (L.geo.Kadaster = L.geo.Geocoder.extend({
            url: "https://geodata.nationaalgeoregister.nl/locatieserver/v3/",
            mark: function (t) {
                this.placeMarker(t.centroide_ll.match(/[\d.]+/g).reverse(), null, t);
            },
            suggest: function (t, e) {
                var n = this,
                    o = this.constructUrl(this.url + "suggest", { q: t + " and -type:postcode" });
                this.fetchJson(o)
                    .then(function (t) {
                        if (t.response.numFound < 1) throw "notfound";
                        return t.highlighting;
                    })
                    .then(function (t) {
                        var n = "";
                        for (var o in t) {
                            n += '<option data-id="' + o + '">' + t[o].suggest.shift() + "</option>";
                        }
                        e.innerHTML = n;
                    })
                    .catch(function (t) {
                        return n.fire(t);
                    });
            },
            lookup: function (t) {
                var e = this,
                    n = this.constructUrl(this.url + "lookup", { id: t });
                this.fetchJson(n)
                    .then(function (t) {
                        return t.response.docs.shift();
                    })
                    .then(function (t) {
                        return e.mark(t);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
            geocode: function (t) {
                var e = this,
                    n = this.constructUrl(this.url + "free", { q: t + " and -type:postcode" });
                this.fetchJson(n)
                    .then(function (t) {
                        if (t.response.numFound < 1) throw "notfound";
                        return t.response.docs.shift();
                    })
                    .then(function (t) {
                        return e.mark(t);
                    })
                    .catch(function (t) {
                        return e.fire(t);
                    });
            },
        }));
    var t = "undefined" != typeof globalThis ? globalThis : "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : {},
        e = /^\s+|\s+$/g,
        n = /^[-+]0x[0-9a-f]+$/i,
        o = /^0b[01]+$/i,
        r = /^0o[0-7]+$/i,
        i = parseInt,
        s = "object" == typeof t && t && t.Object === Object && t,
        u = "object" == typeof self && self && self.Object === Object && self,
        c = s || u || Function("return this")(),
        a = Object.prototype.toString,
        h = Math.max,
        f = Math.min,
        l = function () {
            return c.Date.now();
        };
    function d(t) {
        var e = typeof t;
        return !!t && ("object" == e || "function" == e);
    }
    function g(t) {
        if ("number" == typeof t) return t;
        if (
            (function (t) {
                return (
                    "symbol" == typeof t ||
                    ((function (t) {
                        return !!t && "object" == typeof t;
                    })(t) &&
                        "[object Symbol]" == a.call(t))
                );
            })(t)
        )
            return NaN;
        if (d(t)) {
            var s = "function" == typeof t.valueOf ? t.valueOf() : t;
            t = d(s) ? s + "" : s;
        }
        if ("string" != typeof t) return 0 === t ? t : +t;
        t = t.replace(e, "");
        var u = o.test(t);
        return u || r.test(t) ? i(t.slice(2), u ? 2 : 8) : n.test(t) ? NaN : +t;
    }
    var p = function (t, e, n) {
        var o,
            r,
            i,
            s,
            u,
            c,
            a = 0,
            p = !1,
            m = !1,
            v = !0;
        if ("function" != typeof t) throw new TypeError("Expected a function");
        function L(e) {
            var n = o,
                i = r;
            return (o = r = void 0), (a = e), (s = t.apply(i, n));
        }
        function b(t) {
            return (a = t), (u = setTimeout(x, e)), p ? L(t) : s;
        }
        function k(t) {
            var n = t - c;
            return void 0 === c || n >= e || n < 0 || (m && t - a >= i);
        }
        function x() {
            var t = l();
            if (k(t)) return y(t);
            u = setTimeout(
                x,
                (function (t) {
                    var n = e - (t - c);
                    return m ? f(n, i - (t - a)) : n;
                })(t)
            );
        }
        function y(t) {
            return (u = void 0), v && o ? L(t) : ((o = r = void 0), s);
        }
        function w() {
            var t = l(),
                n = k(t);
            if (((o = arguments), (r = this), (c = t), n)) {
                if (void 0 === u) return b(c);
                if (m) return (u = setTimeout(x, e)), L(c);
            }
            return void 0 === u && (u = setTimeout(x, e)), s;
        }
        return (
            (e = g(e) || 0),
            d(n) && ((p = !!n.leading), (i = (m = "maxWait" in n) ? h(g(n.maxWait) || 0, e) : i), (v = "trailing" in n ? !!n.trailing : v)),
            (w.cancel = function () {
                void 0 !== u && clearTimeout(u), (a = 0), (o = c = r = u = void 0);
            }),
            (w.flush = function () {
                return void 0 === u ? s : y(l());
            }),
            w
        );
    };
    (L.Control.Search = L.Control.extend({
        initialize: function (t) {
            L.setOptions(this, L.extend({ debounce: 300, suggest: 2 }, t));
        },
        onAdd: function (t) {
            var e = t.getContainer().id + "_dl",
                n = L.DomUtil.create("div", "geo-search"),
                o = L.DomUtil.create("input", null, n);
            (o.type = "text"),
            o.setAttribute("name", 'address'),
                o.setAttribute("list", e),
                L.DomEvent.on(
                    o,
                    "input",
                    p(function (e) {
                        e.target.value.length >= this.options.suggest && t._geocoder.suggest(e.target.value, i);
                    }, this.options.debounce),
                    this
                ),
                L.DomEvent.on(
                    o,
                    "change",
                    function (t) {
                        var e = t.target.value,
                            o = i.childNodes;
                        for (var r = 0; r < o.length; r++) if (e.startsWith(o[r].innerText)) return void this._geocoder.lookup(o[r].dataset.id);
                        this.geocode(e);
                    },
                    t
                );
            var r = L.DomUtil.create("button", null, n);
            (r.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>'),
                (r.title = "Search"),
                L.DomEvent.on(
                    r,
                    "click",
                    function (t) {
                        t.preventDefault(), t.stopPropagation(), this.toggle();
                    },
                    this
                );
            var i = L.DomUtil.create("datalist", null, n);
            return (i.id = e), n;
        },
        toggle: function () {
            var t = this.getContainer(),
                e = t.classList,
                n = e.contains("open");
            e.toggle("open"), n || t.children[0].focus();
        },
    })),
        (L.control.search = function (t) {
            return new L.Control.Search(t);
        }),
        L.Map.include({
            marker: null,
            placeMarker: function (t, e, n) {
                if ((this.fire("geofound", { latlng: t, bbox: e, place: n }), this.marker)) this.marker.setLatLng(t);
                else {
                    var o = this.options.createMarker || L.marker;
                    this.marker = o(t).addTo(this);
                }
                this.options.fly ? (e ? this.flyToBounds(e) : this.flyTo(t)) : e ? this.fitBounds(e) : this.panTo(t);
            },
            geocode: function (t) {
                return this._geocoder.geocode(t), this;
            },
            setGeocoder: function (t, e) {
                return void 0 === e && (e = {}), (this._geocoder = new L.geo[t](this, e)), this;
            },
        }),
        L.Map.addInitHook(function () {
            this.setGeocoder("Nominatim", {});
        });
})();
//# sourceMappingURL=leaflet-search.js.map
