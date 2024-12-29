
import { Outlet,  link } from "react-router-dom";
function App(){
    return(

        <div>
            <h1>Admin Plugin Settings</h1>
            <ul>
                <li><link to="post-view">Post View</link></li>
                <li><link to="qr-code">QR Code</link></li>
              
               
                
            </ul>
            <Outlet />
        </div>
        
        
        );
}

export default App;