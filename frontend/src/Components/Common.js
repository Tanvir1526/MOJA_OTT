import {BrowserRouter,Route,Routes} from 'react-router-dom';
import TopMenu2 from './TopMenu2';

import Login from './Login';
import Registration from './Registration';

const Common=()=>{
    return (
        <div>
            <BrowserRouter>
                <TopMenu2/>
                <Routes>
                    <Route path="/" element={<Login/>}></Route>
                    

                </Routes>
            </BrowserRouter>
        </div>
    )
}
export default Common;