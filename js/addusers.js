	function check(f)
	{
		if(f.name.value=="")
			{
				alert("请输入注册用户姓名！");
				f.name.focus();
				return (false);
			}
		if(f.age.value=="")
			{
				alert("请输入注册用户年龄！");
				f.age.focus();
				return (false);
			}
		if(f.phone.value=="")
			{
				alert("请输入注册用户手机号码！");
				f.phone.focus();
				return (false);
			}
		if(f.identity.value=="")
			{
				alert("请输入注册用户身份证号码！");
				f.identity.focus();
				return (false);
			}
		if(f.address.value=="")
			{
				alert("请输入注册用户家庭住址！");
				f.address.focus();
				return (false);
			}
		if(f.password.value=="")
			{
				alert("请输入注册用户密码！");
				f.password.focus();
				return (false);
			}
		if(f.re_password.value != f.password.value)
			{
				alert("重复密码与输入密码不一致！请重新输入！");
				f.re_password.focus();
				f.re_password.select();
				return (false);
			}
	}
	function checkUserName(obj){  
            var name = obj;  
            var checkUserNameResult = document.getElementById("checkUserNameResult");    
            if(name.trim().length==0){  
                  checkUserNameResult.innerHTML = "用户名不能为空";    
                  obj.focus();  
            }else{  
                 checkUserNameResult.innerHTML = "";    
            }  
        }
	function checkUserAge(obj){  
            var age = obj;  
            var checkUserAgeResult = document.getElementById("checkUserAgeResult");    
            if(age.trim().length==0){  
                  checkUserAgeResult.innerHTML = "年龄不能为空";    
                  obj.focus();  
            }else{  
                 checkUserAgeResult.innerHTML = "";    
            }  
        }
	function checkUserPhone(obj){  
            var phone = obj;  
            var checkUserPhoneResult = document.getElementById("checkUserPhoneResult");    
            if(phone.trim().length==0){  
                  checkUserPhoneResult.innerHTML = "手机号码不能为空";    
                  obj.focus();  
            }else{  
                 checkUserPhoneResult.innerHTML = "";    
            }  
        }
	function checkUserIdentity(obj){  
            var identity = obj;  
            var checkUserIdentityResult = document.getElementById("checkUserIdentityResult");    
            if(identity.trim().length==0){  
                  checkUserIdentityResult.innerHTML = "身份证号码不能为空";    
                  obj.focus();  
            }else{  
                 checkUserIdentityResult.innerHTML = "";    
            }  
        }
	
	function checkUserPassword(obj){  
            var password = obj;  
            var checkUserPasswordResult = document.getElementById("checkUserPasswordResult");    
            if(password.trim().length==0){  
                  checkUserPasswordResult.innerHTML = "输入密码不能为空";    
                  obj.focus();  
            }else{  
                 checkUserPasswordResult.innerHTML = "";    
            }  
        }