// Unobtrusive JavaScript Routines

window.onload = function() {
	//	Very Light Box
	new lb('light','light','fade');

	//	Sepia roll overs
	var className=/light/;
	var anchors=document.getElementsByTagName('a');
	for(var i=0;i<anchors.length;i++) {
		if(anchors[i].className && anchors[i].className.match(className)) {
			var image=anchors[i].getElementsByTagName('img')[0];
			var src=image.src;
			image.onmouseout=function() { this.src=this.src.replace(/thumbnails/,'thumbnails2');};
			image.onmouseover=function() {this.src=this.src.replace(/thumbnails2/,'thumbnails');};
			image.src=src.replace(/thumbnails/,'thumbnails2');
		}
	}
};

function rollover() {
	
}

/*

// Provides AJAX functionality

function getXMLHttpRequest() {
	// Add this to your JavaScript Library
	var x=null;
	if(window.XMLHttpRequest) {	
		x= new XMLHttpRequest();
		x.selectSingleNode=function(xpath) {
			var evaluator=new XPathEvaluator();
			var result=evaluator.evaluate(xpath,this,null,XPathResult.FIRST_ORDERED_NODE_TYPE,null);
			if(result!=null) return result.singleNodeValue;
			else return null;
		};
	}
	else if(window.ActiveXObject) x=new ActiveXObject("Microsoft.XMLHttp");
	return x;
}

function getAjaxData(url,json) {
	ajax=getXMLHttpRequest();
	if(!ajax) return null;
	ajax.open('get',url,false);
	ajax.send(null);
	if(!json) return ajax.responseText;
	else return eval("("+ajax.responseText+")");
}

*/