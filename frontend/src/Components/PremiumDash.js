import TopMenu from "./TopMenu";
import axiosConfig from './axiosConfig';
import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { Table } from "react-bootstrap";
const PremiumDash = () => {
    const [movielist, setmovielist] = useState([]);
    useEffect(() => {
        axiosConfig.get("/premiumdash")
            .then((rsp) => {
                setmovielist(rsp.data);
                console.log(rsp.data);
            }).catch((err) => {
                console.log(err);
            }
            );
    }
    , []);
    
    console.warn("data", movielist);

    return(
        <div>
            <TopMenu/>
        <h1>Premium Dashboard</h1>
        <Table striped bordered hover>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Genre</th>
          <th>Country</th>
        </tr>
      </thead>
      {
            movielist.map((movie)=>(
            <tr>
                <td><Link to={`/movie/details/${movie.id}`}>{movie.id}</Link></td>
                <td>{movie.title}</td>
                <td>{movie.genre}</td>
                <td>{movie.country}</td>

            </tr>
            ))
}
    </Table>
        
           


        
        </div>
    )
}
export default PremiumDash;