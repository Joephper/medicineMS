	function check(f)
	{
		if(f.mid.value=="")
			{
				alert("������ҩƷ�ı�ţ�");
				f.mid.focus();
				return (false);
			}
		if(f.mname.value=="")
			{
				alert("������ҩƷ�����ƣ�");
				f.mname.focus();
				return (false);
			}
		if(f.price.value=="")
			{
				alert("������ҩƷ���ۼۣ�");
				f.price.focus();
				return (false);
			}
		if(f.material.value=="")
			{
				alert("������ҩƷ�ĳɷ֣�");
				f.material.focus();
				return (false);
			}
		if(f.mmode.value=="")
			{
				alert("������ҩƷ���÷�������");
				f.mmode.focus();
				return (false);
			}
		if(f.function.value=="")
			{
				alert("������ҩƷ�Ĺ������Σ�");
				f.function.focus();
				return (false);
			}
		if(f.class.value=="")
			{
				alert("������ҩƷ�����");
				f.class.focus();
				return (false);
			}
	}
	