	function check(f)
	{
		if(f.name.value=="")
			{
				alert("������ע���û�������");
				f.name.focus();
				return (false);
			}
		if(f.age.value=="")
			{
				alert("������ע���û����䣡");
				f.age.focus();
				return (false);
			}
		if(f.phone.value=="")
			{
				alert("������ע���û��ֻ����룡");
				f.phone.focus();
				return (false);
			}
		if(f.identity.value=="")
			{
				alert("������ע���û����֤���룡");
				f.identity.focus();
				return (false);
			}
		if(f.address.value=="")
			{
				alert("������ע���û���ͥסַ��");
				f.address.focus();
				return (false);
			}
		if(f.password.value=="")
			{
				alert("������ע���û����룡");
				f.password.focus();
				return (false);
			}
		if(f.re_password.value != f.password.value)
			{
				alert("�ظ��������������벻һ�£����������룡");
				f.re_password.focus();
				f.re_password.select();
				return (false);
			}
	}
	function checkUserName(obj){  
            var name = obj;  
            var checkUserNameResult = document.getElementById("checkUserNameResult");    
            if(name.trim().length==0){  
                  checkUserNameResult.innerHTML = "�û�������Ϊ��";    
                  obj.focus();  
            }else{  
                 checkUserNameResult.innerHTML = "";    
            }  
        }
	function checkUserAge(obj){  
            var age = obj;  
            var checkUserAgeResult = document.getElementById("checkUserAgeResult");    
            if(age.trim().length==0){  
                  checkUserAgeResult.innerHTML = "���䲻��Ϊ��";    
                  obj.focus();  
            }else{  
                 checkUserAgeResult.innerHTML = "";    
            }  
        }
	function checkUserPhone(obj){  
            var phone = obj;  
            var checkUserPhoneResult = document.getElementById("checkUserPhoneResult");    
            if(phone.trim().length==0){  
                  checkUserPhoneResult.innerHTML = "�ֻ����벻��Ϊ��";    
                  obj.focus();  
            }else{  
                 checkUserPhoneResult.innerHTML = "";    
            }  
        }
	function checkUserIdentity(obj){  
            var identity = obj;  
            var checkUserIdentityResult = document.getElementById("checkUserIdentityResult");    
            if(identity.trim().length==0){  
                  checkUserIdentityResult.innerHTML = "���֤���벻��Ϊ��";    
                  obj.focus();  
            }else{  
                 checkUserIdentityResult.innerHTML = "";    
            }  
        }
	
	function checkUserPassword(obj){  
            var password = obj;  
            var checkUserPasswordResult = document.getElementById("checkUserPasswordResult");    
            if(password.trim().length==0){  
                  checkUserPasswordResult.innerHTML = "�������벻��Ϊ��";    
                  obj.focus();  
            }else{  
                 checkUserPasswordResult.innerHTML = "";    
            }  
        }