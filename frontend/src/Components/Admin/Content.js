import axiosConfig from './axiosConfig';
import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
const Content=  ()=>{
    const [content, setcontent] = useState([]);
    useEffect(() => {
        axiosConfig.get("/Admin/Content")
            .then((rsp) => {
                setcontent(rsp.data);
                console.log(rsp.data);
            }).catch((err) => {
                console.log(err);
            }
            );
    }
    , []);
    console.warn("data", content);
    return (
        <div>
             <Table striped bordered hover>
              <thead>
             <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Rating</th>
                    <th>Release Date</th>
                    <th>Director</th>
                    <th>Cast</th>
                    <th>Language</th>
                    <th>Duration</th>
                    <th>Trailer</th>
                    <th>Ban</th>
                    <th></th>
             </tr>
         </thead>
       {
               content.map((content)=>(
                <tr>
                    <td><Link to={`/admin/content${content.id}`}>{content.id}</Link></td>
                    <td>{content.title}</td>
                    <td>{content.genre}</td>
                    <td>{content.country}</td>
                    <td>{content.description}</td>
                    <td>{content.image}</td>
                    <td>{content.rating}</td>
                    <td>{content.release_date}</td>
                    <td>{content.director}</td>
                    <td>{content.cast}</td>
                    <td>{content.language}</td>
                    <td>{content.duration}</td>
                    <td>{content.trailer}</td>
                    <td>{content.ban}</td>
                    <td><Link to={`/admin/content/edit/${content.id}`}>Edit</Link></td>
                </tr>
               ))
       }
   </Table>
            
    
</div>
    )

};
export default Content;