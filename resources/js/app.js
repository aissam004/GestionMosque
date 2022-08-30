require('./bootstrap');

import Alpine from 'alpinejs';
import { cloneDeep } from 'lodash';
//import Tags from './tags'

window.Alpine = Alpine;

Alpine.start();
require('./pdfobject')
require('./dynamic-form');




var classOfOptionsNotToDuplicate="select-options";
var optionsToRemove=[];

//Tags.init("select[multiple].tags");


var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus", "#minus", {

    // the maximum number of form fields
    limit: 10,

    // prefix
    formPrefix: 'dynamic',

    // normalize all fields
    // ideal for server side dulication
    normalizeFullForm: false,
    afterClone: function(clone){

        optionsToRemove.push($("."+classOfOptionsNotToDuplicate).last().find("option:selected").val());


        clone.find("."+classOfOptionsNotToDuplicate+" option").each(function() {
            if (jQuery.inArray( $(this).val(),optionsToRemove)!=-1) {
                $(this).remove();
            }
        });
/*
        clone.find("#minus").click(function() {
            console.log($(clone).nextAll().remove());

        });
*/
        /*
        clone.find("."+classOfOptionsNotToDuplicate).change(function() {
            console.log($(clone).nextAll().remove());

        });
        */

    },
    // color effects

    duration: 3000,

    // JSON data which will prefill the form
    data: {}

});



  window.loadSelect2 = () => {
   $('.tags').select2({
    placeholder : "Selectionner multiple tags...",
    tags: true
  });
  }

  loadSelect2();
  window.livewire.on('loadSelect2Hydrate',()=>{
     loadSelect2();
  });


