import {useParams} from 'react-router-dom';
import { useState,useEffect } from 'react';
import axios from 'axios';
const MovieDetails = () => {
    const {id} = useParams();
    const [movie,setMovie] = useState({});
    const [rating, setRating] = useState("");
    const [report, setReport] = useState("");
    useEffect(() => {
        axios.get(`http://localhost:8000/api/Premium/Inside/${id}`)
        .then(res => {
            setMovie(res.data);
        }).catch(err => {
            console.log(err);
        }
        );
    } , [id]);
    const Rating=(event)=>{
        event.preventDefault();
        var data={rating: rating};
        axiosConfig.post("/",data)
        .then((rsp)=>{
            console.log(rsp.data);
            navigate("/premium");
            
        },(err)=>{
            
        });
    

    }

    const Report=(event)=>{
        event.preventDefault();
        var data={report: report};
        axiosConfig.post("/",data)
        .then((rsp)=>{
            console.log(rsp.data);
            navigate("/premium");
            
        },(err)=>{
            
        });
    

    }
    return (
        <div>
            <h1>{movie.title}</h1>
            <p>{movie.description}</p>
            <img src={movie.image} alt="image"/>

            <form onSubmit={Rating}>
                <input type="number" onChange={(e)=>setRating(e.target.value)} value={rating} />
                <input type="submit" value="Rate"/>
            </form>
            <form onSubmit={Report}>
            
							    <select name="report" id="report" onChange={(e)=>setType(e.target.value)}>
							 	<option value="">Select Report Type</option>
								<option value="notappropriate">Not Appropriate Content</option>
								<option value="sexual">Sexual Content</option>
								<option value="violence">Violence</option>
								<option value="harmful">Harmful</option>
                                <option value="terror">Promotes Terrorism</option>
                                <option value="infringes">Infringes rights</option>
								
							</select>
                            </form>


        </div>
    )
}
export default MovieDetails;