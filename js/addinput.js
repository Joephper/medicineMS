function DateSelector(selYear, selMonth, selDay) { 
this.selYear = selYear; 
this.selMonth = selMonth; 
this.selDay = selDay; 
this.selYear.Group = this; 
this.selMonth.Group = this; 
// ����ݡ��·������˵���Ӵ���onchange�¼��ĺ��� 
if (window.document.all != null) // IE 
{ 
this.selYear.attachEvent("onchange", DateSelector.Onchange); 
this.selMonth.attachEvent("onchange", DateSelector.Onchange); 
} 
else // Firefox 
{ 
this.selYear.addEventListener("change", DateSelector.Onchange, false); 
this.selMonth.addEventListener("change", DateSelector.Onchange, false); 
} 
if (arguments.length == 4) // ��������������Ϊ4�����һ����������ΪDate���� 
this.InitSelector(arguments[3].getFullYear(), arguments[3].getMonth() + 1, arguments[3].getDate()); 
else if (arguments.length == 6) // ��������������Ϊ6�����������������Ϊ��ʼ����������ֵ 
this.InitSelector(arguments[3], arguments[4], arguments[5]); 
else // Ĭ��ʹ�õ�ǰ���� 
{ 
var dt = new Date(); 
this.InitSelector(dt.getFullYear(), dt.getMonth() + 1, dt.getDate()); 
} 
} 
// ����һ����С��ݵ����� 
DateSelector.prototype.MinYear = 2000; 
// ����һ�������ݵ����� 
DateSelector.prototype.MaxYear = 2040; 
// ��ʼ����� 
DateSelector.prototype.InitYearSelect = function () { 
// ѭ�����OPIONԪ�ص����select������ 
for (var i = this.MaxYear; i >= this.MinYear; i--) { 
// �½�һ��OPTION���� 
var op = window.document.createElement("OPTION"); 
// ����OPTION�����ֵ 
op.value = i; 
// ����OPTION��������� 
op.innerHTML = i; 
// ��ӵ����select���� 
this.selYear.appendChild(op); 
} 
} 
// ��ʼ���·� 
DateSelector.prototype.InitMonthSelect = function () { 
// ѭ�����OPIONԪ�ص��·�select������ 
for (var i = 1; i < 13; i++) { 
// �½�һ��OPTION���� 
var op = window.document.createElement("OPTION"); 
// ����OPTION�����ֵ 
op.value = i; 
// ����OPTION��������� 
op.innerHTML = i; 
// ��ӵ��·�select���� 
this.selMonth.appendChild(op); 
} 
} 
// ����������·ݻ�ȡ���µ����� 
DateSelector.DaysInMonth = function (year, month) { 
var date = new Date(year, month, 0); 
return date.getDate(); 
} 
// ��ʼ������ 
DateSelector.prototype.InitDaySelect = function () { 
// ʹ��parseInt������ȡ��ǰ����ݺ��·� 
var year = parseInt(this.selYear.value); 
var month = parseInt(this.selMonth.value); 
// ��ȡ���µ����� 
var daysInMonth = DateSelector.DaysInMonth(year, month); 
// ���ԭ�е�ѡ�� 
this.selDay.options.length = 0; 
// ѭ�����OPIONԪ�ص�����select������ 
for (var i = 1; i <= daysInMonth; i++) { 
// �½�һ��OPTION���� 
var op = window.document.createElement("OPTION"); 
// ����OPTION�����ֵ 
op.value = i; 
// ����OPTION��������� 
op.innerHTML = i; 
// ��ӵ�����select���� 
this.selDay.appendChild(op); 
} 
} 
// ������ݺ��·�onchange�¼��ķ���������ȡ�¼���Դ���󣨼�selYear��selMonth�� 
// ����������Group���󣨼�DateSelectorʵ����������캯�����ṩ��InitDaySelect�������³�ʼ������ 
// ����eΪevent���� 
DateSelector.Onchange = function (e) { 
var selector = window.document.all != null ? e.srcElement : e.target; 
selector.Group.InitDaySelect(); 
} 
// ���ݲ�����ʼ�������˵�ѡ�� 
DateSelector.prototype.InitSelector = function (year, month, day) { 
// �����ⲿ�ǿ��Ե���������������������ҲҪ��selYear��selMonth��ѡ����յ� 
// ������ΪInitDaySelect�����Ѿ���������������˵����������Ͳ����ظ������� 
this.selYear.options.length = 0; 
this.selMonth.options.length = 0; 
// ��ʼ���ꡢ�� 
this.InitYearSelect(); 
this.InitMonthSelect(); 
// �����ꡢ�³�ʼֵ 
this.selYear.selectedIndex = this.MaxYear - year; 
this.selMonth.selectedIndex = month - 1; 
// ��ʼ������ 
this.InitDaySelect(); 
// ����������ʼֵ 
this.selDay.selectedIndex = day - 1; 
} 

function check(f)
	{
		if(f.mid.value=="")
			{
				alert("������ҩƷ�ı�ţ�");
				f.mid.focus();
				return (false);
			}
		if(f.aid.value=="")
			{
				alert("�����뾭���˵ı�ţ�");
				f.aid.focus();
				return (false);
			}
		if(f.sid.value=="")
			{
				alert("�����빩Ӧ�̵ı�ţ�");
				f.sid.focus();
				return (false);
			}
		if(f.ino.value=="")
			{
				alert("������ҩƷ�����ţ�");
				f.ino.focus();
				return (false);
			}
		if(f.iprice.value=="")
			{
				alert("������ҩƷ�Ľ��ۣ�");
				f.iprice.focus();
				return (false);
			}
		if(f.inum.value=="")
			{
				alert("���������ҩƷ��������");
				f.inum.focus();
				return (false);
			}
		
		

	}
	