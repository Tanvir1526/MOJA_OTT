import MenuItem from "./MenuItem";
import {Navbar, Nav, Container} from "react-bootstrap";
const TopMenu=()=>{
    return (
        <div>
            <Navbar bg="dark" variant="dark">
        <Container>
          <Navbar.Brand href="#home">Moja</Navbar.Brand>
          <Nav className="me-auto navbar_wrapper">
            <MenuItem url="/home" title="Home"/>
            <MenuItem url="/profile" title="Profile"/>
            <MenuItem url="/premium" title="Premium"/>
            <MenuItem url="/post" title="Post"/>
            <MenuItem url="/login" title="Login"/>
            <MenuItem url="/reg" title="Registration"/>
            <MenuItem url="/list/student" title="List"/>
          </Nav>
          </Container>
      </Navbar>

            
        </div>
    )
}
export default TopMenu;