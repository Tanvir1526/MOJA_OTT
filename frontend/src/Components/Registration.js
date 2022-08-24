import TopMenu from "./TopMenu";
import axiosConfig from "./axiosConfig";
import { useState } from "react";

const Registration = () => {


    const [name, setName] = useState("");
    const[email,setEmail]=useState("");
    const[password,setPass]=useState("");
    const[conf_password,setConfirmPass]=useState("");
    const[type,setType]=useState("");

    const Submit=(event)=>{
        event.preventDefault();
        var data={name:name,email:email, password:password,conf_password:conf_password,type:type};
        axiosConfig.post("/register",data)
        .then((rsp)=>{
            console.log(rsp.data);
            
            
        },(err)=>{
            
        });
    

    }





    return (
        <div>
        
        <form onSubmit={Submit}> 
            Name: <input type="text" onChange={(e)=>setName(e.target.value)} value={name}/><br/>   
            Email : <input type="text" onChange={(e)=>setEmail(e.target.value)} value={email}/><br/>
            Password:  <input type="password" onChange={(e)=>setPass(e.target.value)} value={password} ></input><br/>
            Confirm Password:  <input type="password" onChange={(e)=>setConfirmPass(e.target.value)} value={conf_password} ></input><br/>
            
            
                    
                    <label for="Type"class="sign__text" >Type :</label>
							 <select name="type" id="type" onChange={(e)=>setType(e.target.value)}>
							 	<option value="">Select Type</option>
								 <option value="premium">Premium Subscriber</option>
								<option value="free">Free Subscriber</option>
								<option value="admin">Admin</option>
								<option value="production">Production House</option>
								
							</select>
                    
                    <button type="submit" className="btn btn-primary">
                        Submit
                    </button>
                    </form>
                </div>
    );
    }
    export default Registration;