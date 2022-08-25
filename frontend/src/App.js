import './App.css';
import Login from './Components/Login';

import Dashboard from './Components/Admin/Dashboard';
import {BrowserRouter,Route,Routes} from 'react-router-dom';
import TopMenu from './Components/TopMenu';
import Registration from './Components/Registration';
import PremiumDash from './Components/PremiumDash';
import Logout from './Components/Logout';
import Profile from './Components/Profile';
import CreateUser from './Components/Admin/CreateUser';

function App() {
  return (
    <div>
      <BrowserRouter>
        <TopMenu/>
        
        <Routes>
            <Route path="/" element={<Login/>}></Route>
            <Route path="/reg" element={<Registration/>}></Route>
            <Route path="/premium" element={<PremiumDash/>}></Route>
            <Route path="/profile" element={<Profile/>}></Route>
            <Route path="/admin" element={<Dashboard/>}></Route>
            <Route path="/logout" element={<Logout/>}></Route>
            <Route path="/createuser" element={<CreateUser/>}></Route>
            
            </Routes>
            
      </BrowserRouter>
    </div>
    
  );
}

export default App;
