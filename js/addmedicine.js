	function check(f)
	{
		if(f.mid.value=="")
			{
				alert("请输入药品的编号！");
				f.mid.focus();
				return (false);
			}
		if(f.mname.value=="")
			{
				alert("请输入药品的名称！");
				f.mname.focus();
				return (false);
			}
		if(f.price.value=="")
			{
				alert("请输入药品的售价！");
				f.price.focus();
				return (false);
			}
		if(f.material.value=="")
			{
				alert("请输入药品的成分！");
				f.material.focus();
				return (false);
			}
		if(f.mmode.value=="")
			{
				alert("请输入药品的用法用量！");
				f.mmode.focus();
				return (false);
			}
		if(f.function.value=="")
			{
				alert("请输入药品的功能主治！");
				f.function.focus();
				return (false);
			}
		if(f.class.value=="")
			{
				alert("请输入药品的类别！");
				f.class.focus();
				return (false);
			}
	}
	