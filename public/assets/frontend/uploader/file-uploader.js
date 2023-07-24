$(function(){
    const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
    $(".fileUploader").on('change', function(e){
        $('.file-uploader.temp').removeClass('temp');

        //remove cloud icon
        var thisFileUploader = this;
        $(this).parent().addClass('temp');
        $(this).parent().find("label").html("");

        if(this.files.length > 0){
            addReadableImageData(this, this.files.item(0), 0);
        }

        // Ajout des fichiers dans l'objet DataTransfer
        for (let file of this.files) {
            dt.items.add(file);
        }
        // Mise à jour des fichiers de l'input file après ajout
        this.files = dt.files;


        setTimeout(function(){
            // EventListener pour le bouton de suppression créé
            $(thisFileUploader).parent().find('.preview-files .row .col-auto i').click(function(){
                let name = $(this).parent().find('img').attr('title');
                // Supprimer l'affichage du nom de fichier
                $(this).parent().remove();
                console.log(dt.items.length)
                for(let i = 0; i < dt.items.length; i++){
                    // Correspondance du fichier et du nom
                    console.log(name, dt.items[i].getAsFile().name)

                    if(name === dt.items[i].getAsFile().name){
                        // Suppression du fichier dans l'objet DataTransfer
                        dt.items.remove(i);
                        //continue;
                    }
                }
                // Mise à jour des fichiers de l'input file après suppression
                //document.getElementById('fileUploader').files = dt.files;
                $(this).find('.fileUploader').prop('files', dt.files);
            });
        }, 100);
    });
});

function chooseFile(elem){
    const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
    $('.file-uploader.temp').removeClass('temp');

    //remove cloud icon
    var thisFileUploader = elem;
    $(elem).parent().addClass('temp');
    $(elem).parent().find("label").html("");

    if(elem.files.length > 0){
        addReadableImageData(elem, elem.files.item(0), 0);
    }

    // Ajout des fichiers dans l'objet DataTransfer
    for (let file of elem.files) {
        dt.items.add(file);
    }
    // Mise à jour des fichiers de l'input file après ajout
    elem.files = dt.files;


    setTimeout(function(){
        // EventListener pour le bouton de suppression créé
        $(thisFileUploader).parent().find('.preview-files .row .col-auto i').click(function(){
            let name = $(elem).parent().find('img').attr('title');
            // Supprimer l'affichage du nom de fichier
            $(elem).parent().remove();
            console.log(dt.items.length)
            for(let i = 0; i < dt.items.length; i++){
                // Correspondance du fichier et du nom
                console.log(name, dt.items[i].getAsFile().name)

                if(name === dt.items[i].getAsFile().name){
                    // Suppression du fichier dans l'objet DataTransfer
                    dt.items.remove(i);
                    //continue;
                }
            }
            // Mise à jour des fichiers de l'input file après suppression
            //document.getElementById('fileUploader').files = dt.files;
            $(elem).find('.fileUploader').prop('files', dt.files);
        });
    }, 100);
}

function addReadableImageData(onChangeElem, item, i){
    if(item){
        var fileName = item.name;
        var fileExtension = item.name.split('.').pop();

        if (onChangeElem.files && onChangeElem.files.item(i)) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                if(fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png' || fileExtension == 'gif'){
                    var uploadedElem = '<div class="col-auto"><i class="fas fa-trash"></i><img title="'+fileName+'" src="'+e.target.result+'" height="80px"></div>';
                }else if(fileExtension == 'mp4' || fileExtension == 'mov' || fileExtension == 'wmv' || fileExtension == 'avi' || fileExtension == 'mkv' || fileExtension == 'webm'){
                    var uploadedElem = '<div class="col-auto"><i class="fas fa-trash"></i><video autoplay muted title="'+fileName+'" src="'+e.target.result+'" height="80px"></div>';
                }else{
                    var uploadedElem = '<div class="col-auto"><i class="fas fa-trash"></i><small>No Preview</small></div>';
                }
                $('.file-uploader.temp .preview-files .row').append(uploadedElem);
            }
            
            reader.readAsDataURL(onChangeElem.files.item(i));
        }

        if(onChangeElem.files.length > i){
            addReadableImageData(onChangeElem, onChangeElem.files.item(i+1), i+1);
        }
    }
}