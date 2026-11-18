import "../../assets/styles/public-header.css";

import { NavLink } from "react-router-dom";

export const PublicHeader = () => {
    return (
        <header className="public-header px-4 sm:px-12 py-7">
            <nav className="row align-items-center">
                <NavLink to="/" className="logo col-10 sm:col-3 fs-xl fg-inverse"><i className="fa-solid fa-people-roof"></i></NavLink>

                <div className="menus d-none sm:d-flex justify-content-center sm:col-6 text-center">
                    <NavLink to="/" className="mx-2 px-3 lg:px-5 py-1 text-decoration-none fg-secondary">Home</NavLink>
                    <NavLink to="/about-us" className="mx-2 px-3 lg:px-5 py-1 text-decoration-none fg-secondary">About</NavLink>
                    <NavLink to="/properties" className="mx-2 px-3 lg:px-5 py-1 text-decoration-none fg-secondary">Property</NavLink>
                    <NavLink to="/contact" className="mx-2 px-3 lg:px-5 py-1 text-decoration-none fg-secondary">Contact</NavLink>
                </div>

                <div className="login-btns col-2 sm:col-3 d-flex justify-content-end">
                    <NavLink to="/login" className="px-3 py-1 d-none lg:d-block text-decoration-none fg-inverse">Login</NavLink>
                    <NavLink to="/signup" className="px-3 py-1 d-none lg:d-block text-decoration-none fg-white rounded-9">SignUp</NavLink>
                    <div className="d-inline lg:d-none"><i className="fa-solid fa-bars"></i></div>
                </div>
            </nav>
        </header>
    );
}