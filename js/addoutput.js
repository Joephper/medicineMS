function check(f)
	{
		if(f.id.value=="")
			{
				alert("请输入顾客的编号！");
				f.id.focus();
				return (false);
			}
		if(f.mid.value=="")
			{
				alert("请输入药品的编号！");
				f.mid.focus();
				return (false);
			}
		if(f.aid.value=="")
			{
				alert("请输入经办人的编号！");
				f.aid.focus();
				return (false);
			}
		if(f.ino.value=="")
			{
				alert("请输入药品的批号！");
				f.ino.focus();
				return (false);
			}
		if(f.symptom.value=="")
			{
				alert("请输入顾客的患病症状！");
				f.symptom.focus();
				return (false);
			}
		if(f.onum.value=="")
			{
				alert("请输入进购药品的数量！");
				f.onum.focus();
				return (false);
			}
		
		

	}
	