import { React, useContext, useEffect, useState } from 'react'
import "./navbaar.css";
import SearchIcon from '@mui/icons-material/Search';
import Badge from '@mui/material/Badge';
import ShoppingCartIcon from '@mui/icons-material/ShoppingCart';
import Avatar from '@mui/material/Avatar';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';
import Drawer from '@mui/material/Drawer';
// import Rightheader from './Rightheader';
import { NavLink, useNavigate } from 'react-router-dom';
import { Logincontext } from '../context/ContextProvider';
import Menu from '@mui/material/Menu';
import MenuItem from '@mui/material/MenuItem';
import LogoutIcon from '@mui/icons-material/Logout';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';


const Navbaar = () => {
    const { account, setAccount } = useContext(Logincontext);
    console.log(account);

    const history = useNavigate();


    const [anchorEl, setAnchorEl] = useState(null);
    const open = Boolean(anchorEl);
    const handleClick = (event) => {
        setAnchorEl(event.currentTarget);
    };
    const handleClose = () => {
        setAnchorEl(null);
    };

    const getdetailvaliduser = async () => {
        const res = await fetch("/validuser", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json"
            },
            credentials: "include"
        });
        const data = await res.json();
        // console.log(data);
        if (res.status !== 201) {
            console.log("Error");
        } else {
            console.log("Data valid");
            setAccount(data);
        }
    }



    const logoutuser = async () => {
        const res2 = await fetch("/logout", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json"
            },
            credentials: "include"
        });
        const data2 = await res2.json();
        // console.log(data);
        if (res2.status !== 201) {
            console.log("Error");
        } else {
            console.log("Data valid");
            toast.success("Logout Successfully",{
                position: "top-center",
            })
            setAccount(false);
            history("/");
        }
    }
    useEffect(() => {
        getdetailvaliduser();
    }, [])

    return (
        <div>
            <header>
                <nav>
                    <div className="left">


                        <IconButton className='hamburgur'>

                            <MenuIcon style={{ color: "#fff" }} />
                        </IconButton>

                        <Drawer>
                            {/* <Rightheader /> */}
                        </Drawer>
                        <div className="navlogo">
                            <NavLink to="/">  <img src=".\amazon_PNG25.png" alt="" /> </NavLink>
                        </div>
                        <div className="nav_searchbaar">
                            <input type="text" name="" id='' />
                            <div className="search_icon">
                                <SearchIcon id="search" />
                            </div>
                        </div>
                    </div>
                    <div className="right">
                        <div className="nav_btn">
                            <NavLink to="/login">SignIn</NavLink>
                        </div>
                        <div className="cart_btn">
                            {
                                account ? <NavLink to="/buynow">
                                    <Badge badgeContent={account.carts.length} color="primary">
                                        <ShoppingCartIcon id="icon" />
                                    </Badge>
                                </NavLink> : <NavLink to="/login">
                                    <Badge badgeContent={0} color="primary">
                                        <ShoppingCartIcon id="icon" />
                                    </Badge>
                                </NavLink>
                            }


                            <p>Cart</p>

                        </div>
                        {
                            account ? <Avatar className='avtar2'
                                id="basic-button"
                                aria-controls={open ? 'basic-menu' : undefined}
                                aria-haspopup="true"
                                aria-expanded={open ? 'true' : undefined}
                                onClick={handleClick}
                            >{account.fname[0].toUpperCase()}
                            </Avatar> : <Avatar className='avtar'
                                id="basic-button"
                                aria-controls={open ? 'basic-menu' : undefined}
                                aria-haspopup="true"
                                aria-expanded={open ? 'true' : undefined}
                                onClick={handleClick}
                            ></Avatar>
                        }


                        <Menu
                            id="basic-menu"
                            anchorEl={anchorEl}
                            open={open}
                            onClose={handleClose}
                            MenuListProps={{
                                'aria-labelledby': 'basic-button',
                            }}
                        >
                            {/* <MenuItem onClick={handleClose}>Profile</MenuItem> */}
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            {
                                account ?  <MenuItem onClick={handleClose} style={{ margin: 10 }} onClick={logoutuser}>
                                    <LogoutIcon style={{fontSize:16,marginRight:3}}/> Logout</MenuItem> :""
                            }
                           
                        </Menu>
                    </div>
                    <ToastContainer />
                </nav>
            </header>
        </div>
    )
}

export default Navbaar;
