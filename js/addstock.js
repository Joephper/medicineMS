	function check(f)
	{
		if(f.mid.value=="")
			{
				alert("请输入药品的编号！");
				f.mid.focus();
				return (false);
			}
		if(f.ino.value=="")
			{
				alert("请输入药品的商品批号！");
				f.ino.focus();
				return (false);
			}
		if(f.snum.value=="")
			{
				alert("请输入药品的总数量！");
				f.snum.focus();
				return (false);
			}
	}
	