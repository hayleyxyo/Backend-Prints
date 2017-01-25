//	Inspired by:
//	http://luke.breuer.com/tutorial/javascript-grid-tutorial.aspx

window.onload=init;
var oldValue=null;
var oldCell=null;
var oldRow=null;
var test='hello';
var dataTable;

function init() {
	var grid=document.getElementById('grid');
	dataTable=getAjaxData('http://resources.comparity.net/prints/includes/ordersajax.php',true);
	initTable('grid',dataTable);
	grid.onsubmit='checkGrid';
}

function initTable(grid,dataTable) {
	grid=document.getElementById(grid);
	var tr,td,i,j;
	var table=document.createElement('table');
	grid.insertBefore(table,grid.firstChild);

	//	Title Row
	var tr=table.insertRow(0);
	for(i=0;i<dataTable.header.length;i++) {
		td=document.createElement('th');
		td.innerHTML=dataTable.header[i];
		tr.appendChild(td);
	}
	//	Data Rows
	for(i in dataTable.data) {
		tr=table.insertRow(-1);
		for(j=0;j<dataTable.data[i].length;j++) {
			td=tr.insertCell(-1);
			td.innerHTML=dataTable.data[i][j];
		}
		tr.ondblclick=editRow;
		tr.onclick=selectRow;
	}
}

function checkGrid() {
	if(oldRow) for(var i=0;i<oldRow.length;i++) {
		if(columns[i].name) input2td(oldRow[i],false);
	}
}

var columns=new Array();

function data(name) {
	this.name=(name.charAt(0)=='-')?name.substring(1):name;
	this.locked=(name.charAt(0)=='-')?true:false;
	var items=name.split(':');
	this.width='';
	if(items.length>1) {
		this.name=items[0];
		this.width=items[1]+'px';
	}
	this.cell=null;
	this.value=null;
	this.test=1;
}


function input2td(td,restore) {
	td.innerHTML=restore?restore:td.getElementsByTagName('input')[0].value;
}
function td2input(td,name,locked,select) {
	var input=document.createElement('input');
	input.type='text';
	input.name=name;
	if(locked) {
		input.readOnly="readonly";
	}
	input.value=td.innerHTML;
	input.style.width=(td.offsetWidth-7)+'px';
	//input.style.height=(td.offsetHeight-6)+'px';
	td.innerHTML='';
	td.appendChild(input);
	if(select) input.select();
}

function getTarget(e) {
	e = e || window.event;
	return e.target || e.srcElement;
}
function getRow(target) {
	var tr=target.parentNode;
	while(tr.tagName!='TR') tr=tr.parentNode;
	return tr;
}
function selectRow(e) {
	var row=getRow(getTarget(e));
	var table=row.parentNode.getElementsByTagName('tr');
	for(var i=0;i<table.length;i++)
		table[i].className='';
	row.className='selected';
}

function editRow(e) {
	var tr=getRow(getTarget(e));
	tr=tr.getElementsByTagName('td');
	if(oldRow!=tr) {
		if(oldRow) for(var i=0;i<oldRow.length;i++) {
			input2td(oldRow[i],false);
		}
		for(var i=0;i<tr.length;i++) {
			//td2input(tr[i],dataTable.header[i],dataTable.format[i].type!='text',false);
			td2input(tr[i],dataTable.header[i],false,false);
		}
		oldRow=tr;
	}
	else {
	
	}
}

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
	var ajax=getXMLHttpRequest();
	if(!ajax) return null;
	ajax.open('get',url,false);
	ajax.send(null);
	if(!json) return ajax.responseText;
	else return eval("("+ajax.responseText+")");
}
