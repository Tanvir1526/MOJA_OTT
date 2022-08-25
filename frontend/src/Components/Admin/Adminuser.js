import axiosConfig from './axiosConfig';
import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
const Adminuser=()=>{
    const [Adminuser, setAdminuser] = useState([]);
    useEffect(() => {
        axiosConfig.get("/admin")
            .then((rsp) => {
                setmovielist(rsp.data);
                console.log(rsp.data);
            }).catch((err) => {
                console.log(err);
            }
            );
    }
    , []);
    
    console.warn("data", Adminuser);

    return(
        <div>
             <Table striped bordered hover>
             <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined At</th>
                <th>Role</th>
                <th>Ban</th>
                <th></th>
            </tr>
        </thead>
      {
            Adminuser.map((user)=>(
            <tr>
                <td><Link to={`/admin/user${user.id}`}>{user.id}</Link></td>
                <td>{user.name}</td>
                <td>{user.Email}</td>
                <td>{user.JoinedAt}</td>
                <td>{user.role}</td>
                <td>{user.ban}</td>
                <td>
                    <button className="btn btn-primary"><Link to={`/admin/user${user.id}`}>{movie.id}</Link>Details</button>
                    <button className="btn btn-secondary"><Link to={`/admin/user${user.id}`}>{movie.id}</Link>Edit</button>

                    <button className="btn btn-danger"><Link to={`/admin/user${user.id}`}>{movie.id}</Link>Deete</button>

                </td>
            </tr>
            ))
}
    </Table>
           

        </div>
    )
}
export default Adminuser;