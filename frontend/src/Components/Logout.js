import TopMenu from "./TopMenu";
import { useNavigate } from "react-router-dom";
const Logout = () => {
    const navigate = useNavigate();
    localStorage.removeItem("_authToken");
    navigate("/");
    return(
        <div>
            <TopMenu/>
        
        </div>
    )
}
export default Logout;