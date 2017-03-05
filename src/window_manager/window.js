class Window {
    constructor(name, id){
        this.name = name;
        this.id = id;
    }
    
    getID(){
        return "#"+this.id+"";
    }
    

    
    setSize(width, height){
        $("#"+this.id+"").height(height+$(".titleBar").height);
        $("#"+this.id+"").width(width);
    }
    
    setPosition(x,y){
        $("#"+this.id+"").css("left", x);
        $("#"+this.id+"").css("top", y);

    }
    
    append(toBeAppended){
        $("#"+this.id+"").append(toBeAppended);
    }

    addDiv(id){
        this.append("<div id='"+id+"'></div>");
    }
    
    isSizeFixed(boolean){
        if(boolean){
            $("#"+this.id+"").resizable("disable");
            $("#"+this.id+"").css("min-height", "0px");
            $("#"+this.id+"").css("min-width", "0px");

        }
    }
    
    draw(){
        $("#windowPane").append("<li><div id=\""+this.id+"\" class='window'></div></li>");
        $("#"+this.id+"").height("50px");
        $("#"+this.id+"").width("50px");
        $("#"+this.id+"").css("position", "absolute");

        this.setSize("350px", "250px");
        this.append("<p class='titleBar' >"+this.name+"</p>");
        $("#"+this.id+"").resizable();
        $("#"+this.id+"").draggable({ handle: ".titleBar", stack : ".window" });
        
    }
    
    minimize(){
        this.setPosition("0", "0");
    }
    

    
}


$( document ).ready(function() {
    $('head').append("<link rel=\"stylesheet\" type=\"text/css\" href=\"window_manager/window.css\">");
 
    
});
