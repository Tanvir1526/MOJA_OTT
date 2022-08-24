import {Link} from 'react-router-dom';
const MenuItem2 =({url,title})=>{
    return (
        <Link to={url}>{title}</Link>
    )   
}
export default MenuItem2;