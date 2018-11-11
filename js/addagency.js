	function check(f)
	{
		if(f.aid.value=="")
			{
				alert("请输入经办人的编号！");
				f.aid.focus();
				return (false);
			}
		if(f.aname.value=="")
			{
				alert("请输入经办人的姓名！");
				f.aname.focus();
				return (false);
			}
		if(f.aphone.value=="")
			{
				alert("请输入经办人的手机号码！");
				f.aphone.focus();
				return (false);
			}
	}
	