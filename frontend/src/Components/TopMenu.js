import MenuItem from "./MenuItem";
import {Navbar, Nav, Container} from "react-bootstrap";
const TopMenu=()=>{
    return (
        <div>
            <Navbar bg="dark" variant="dark">
        <Container>
          <Navbar.Brand href="#home">Moja</Navbar.Brand>
          <Nav className="me-auto navbar_wrapper">

        {
            localStorage.getItem("_authToken")?
            <>
            <MenuItem url="/premium" title="Home"/>
            <MenuItem url="/profile" title="Profile"/>
            
            
            
            <MenuItem url="/logout" title="Logout"/>
            </>
            :
            <>
            <MenuItem url="/login" title="Login"/>
            <MenuItem url="/reg" title="Registration"/>
            </>
        }
            
          </Nav>
          </Container>
      </Navbar>

            
        </div>
    )
}
export default TopMenu;