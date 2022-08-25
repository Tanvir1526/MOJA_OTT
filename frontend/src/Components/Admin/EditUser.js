import axiosConfig from "./axiosConfig";
import { useState } from "react";
import { useNavigate } from "react-router-dom";
import axiosConfig from "./axiosConfig";

const EditUser = () => {
    onst [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [conf_password, setConf_password] = useState("");
    const [type, setType] = useState("");
    const [user, setUser] = useState({
        name: "",
        email: "",
        password: "",
        conf_password: "",
        type: "",
    });
    const navigate = useNavigate();
    const onChange = (e) => {
        setUser({ ...user, [e.target.name]: e.target.value });
    }
    const onSubmit = (e) => {
        e.preventDefault();
        var data = {
            name: name,
            email: email,
            password: password,
            conf_password: conf_password,
            type: type,
        };
        axiosConfig.post("/register", data)
            .then((rsp) => {
                console.log(rsp.data);
                navigate("/");
            }).catch((err) => {
                console.log(err);
            }
            );
    }
    return (
        <div>
            
            <div className="container">
        <div className="row">
            <div className="col-md-6 m-auto">
            <div className="card bg-white py-2 px-4">
                <div className="card-body">
                <h1 className="mb-4">
                    <i className="fas fa-user-edit"></i> Edit User
                </h1>
                <form onSubmit={onSubmit}>
                    <div className="form-group">
                    <label htmlFor="name">Name</label>
                    <input
                        type="text"
                        className="form-control"
                        name="name"
                        value={user.name}
                        onChange={onChange}
                    />
                    </div>
                    <div className="form-group">
                    <label htmlFor="email">Email</label>
                    <input
                        type="email"
                        className="form-control"
                        name="email"
                        value={user.email}
                        onChange={onChange}
                    />
                    </div>
                    <div className="form-group">
                    <label htmlFor="password">Password</label>
                    <input
                        type="password"
                        className="form-control"
                        name="password"
                        value={user.password}
                        onChange={onChange}
                    />
                    </div>
                    <div className="form-group">
                    <label htmlFor="password2">Confirm Password</label>
                    <input
                        type="password"
                        className="form-control"
                        name="password2"
                        value={user.password2}
                        onChange={onChange}
                    />
                    </div>
                    <button type="submit" className="btn btn-primary btn-block">
                    Update User
                    </button>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    )
}
export default EditUser;


   