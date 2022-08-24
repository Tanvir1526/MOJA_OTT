import {BrowserRouter,Route,Routes} from 'react-router-dom';
import TopMenu from './TopMenu';

import Login from './Login';

const Main=()=>{
    return (
        <div>
            <BrowserRouter>
                <TopMenu/>
                <Routes>
                    
                    

                </Routes>
            </BrowserRouter>
        </div>
    )
}
export default Main;