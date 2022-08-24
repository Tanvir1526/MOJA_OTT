import { useState } from "react";
import axiosConfig from './axiosConfig';
import { useNavigate } from "react-router-dom";
import TopMenu from "./TopMenu";
const Login =()=>{
    const[token_key,setTokenKey]=useState('');
    const[email,setName]=useState("");
    const[password,setPass]=useState("");
    const navigate=useNavigate();
    const Submit=(event)=>{
        event.preventDefault();
        var data={email:email, password:password};
        axiosConfig.post("/login",data)
        .then((rsp)=>{
            console.log(rsp.data);
            localStorage.setItem('_authToken',rsp.data.token_key);
            navigate("/premium");
        },(err)=>{
            
        });
    

    }
    
    return(
        <div>
            
        <form onSubmit={Submit}>
            Email : <input type="text" onChange={(e)=>setName(e.target.value)} value={email}/><br/>
            Password:  <input type="password" onChange={(e)=>setPass(e.target.value)} value={password} ></input><br/>
            <input type="submit" value="login"/>
        </form>
        </div>
    )
}

export default Login;


