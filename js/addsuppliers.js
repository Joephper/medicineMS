	function check(f)
	{
		if(f.sid.value=="")
			{
				alert("请输入供应商的编号！");
				f.sid.focus();
				return (false);
			}
		if(f.sname.value=="")
			{
				alert("请输入供应商经手人的姓名！");
				f.sname.focus();
				return (false);
			}
		if(f.sphone.value=="")
			{
				alert("请输入供应商经手人的手机号码！");
				f.sphone.focus();
				return (false);
			}
	}
	