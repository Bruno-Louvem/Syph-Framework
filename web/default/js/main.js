jQuery(document).ready(function() {
    
    var Syntax = function() {
        var hello = function(text) {
            alert("Olá " + text);
        }
        var SyntaxTool = {
            Initialize: function(private, idT, classe) {
                private.idT = idT;
                
            },
            Private:{
                idT: null
                
            },
            Public:{
                getIdT: function(private){
                    return private.idT;
                },
                hide: function(private){
                    $("#"+private.idT).hide();
                }
            }
        }
        var handlerTools = function() {
            var tools = [];
            $(".tool").each(function(index) {
                tools[index] = $.makeclass(SyntaxTool, this.id);
            });
        }

        return {
            init: function() {
                handlerTools();
            }
        };
    }();
    
    var cnv = jQuery('canvas').get(0);
    $(cnv).hide();
    Syntax.init();
});
