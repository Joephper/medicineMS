	function check(f)
	{
		if(f.sid.value=="")
			{
				alert("�����빩Ӧ�̵ı�ţ�");
				f.sid.focus();
				return (false);
			}
		if(f.sname.value=="")
			{
				alert("�����빩Ӧ�̾����˵�������");
				f.sname.focus();
				return (false);
			}
		if(f.sphone.value=="")
			{
				alert("�����빩Ӧ�̾����˵��ֻ����룡");
				f.sphone.focus();
				return (false);
			}
	}
	