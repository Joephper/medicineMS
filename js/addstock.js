	function check(f)
	{
		if(f.mid.value=="")
			{
				alert("������ҩƷ�ı�ţ�");
				f.mid.focus();
				return (false);
			}
		if(f.ino.value=="")
			{
				alert("������ҩƷ����Ʒ���ţ�");
				f.ino.focus();
				return (false);
			}
		if(f.snum.value=="")
			{
				alert("������ҩƷ����������");
				f.snum.focus();
				return (false);
			}
	}
	