	function check(f)
	{
		if(f.aid.value=="")
			{
				alert("�����뾭���˵ı�ţ�");
				f.aid.focus();
				return (false);
			}
		if(f.aname.value=="")
			{
				alert("�����뾭���˵�������");
				f.aname.focus();
				return (false);
			}
		if(f.aphone.value=="")
			{
				alert("�����뾭���˵��ֻ����룡");
				f.aphone.focus();
				return (false);
			}
	}
	