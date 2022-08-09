import { useState } from "react";
import axiosConfig from './axiosConfig';
import PremDash from './Components/Premium/PremDash';
const Login =()=>{
    const[email,setName]=useState("");
    const[password,setPass]=useState("");

    const Submit=(event)=>{
        event.preventDefault();
        var data={email:email, password:password};
        axiosConfig.post("/login",data)
        .then((rsp)=>{
            console.log(rsp.data);
            localStorage.setItem('_authToken',rsp.data.token_key);
        },(err)=>{
            
        });
    

    }
    
    return(
        <form onSubmit={Submit}>
            Email : <input type="text" onChange={(e)=>setName(e.target.value)} value={email}/><br/>
            Password:  <input type="password" onChange={(e)=>setPass(e.target.value)} value={password} ></input><br/>
            <input type="submit" value="login"/>
        </form>
    )
}

export default Login;