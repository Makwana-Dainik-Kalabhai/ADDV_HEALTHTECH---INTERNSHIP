import { NavLink } from "react-router-dom";

export const PublicFooter = () => {
    return (
        <section>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>

            <div className="footer-1 px-12">
                <div className="row align-items-center py-7 mx-12 my-5 border-top border-bottom">
                    <div className="col-8">
                        <h3>Start your real estate journey today</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit obcaecati molestiae dolor ad quas, quam repellendus cupiditate! Molestias eius reiciendis eligendi necessitatibus. Excepturi eveniet eaque fugit illo provident perspiciatis veritatis?</p>
                    </div>

                    <div className="col-4 d-flex justify-content-center">
                        <button className="btn-solid theme-accent">Explore Now</button>
                    </div>
                </div>
            </div>
            <div className="footer-2 px-12 mt-12">
                <div className="row px-12 align-items-start">
                    <NavLink to="/" className="col-2 fs-5xl text-center fg-inverse">
                        <i className="fa-solid fa-people-roof"></i>
                    </NavLink>
                    <div className="col-2">
                        <h5 className="text-decoration-underline">Pages</h5>
                        <NavLink to="/" className="d-block text-decoration-none fg-black fs-sm">Home</NavLink>
                        <NavLink to="/properties" className="d-block text-decoration-none fg-black fs-sm">Properties</NavLink>
                        <NavLink to="/contact" className="d-block text-decoration-none fg-black fs-sm">Contact US</NavLink>
                        <NavLink to="/about-us" className="d-block text-decoration-none fg-black fs-sm">About US</NavLink>
                    </div>
                    <div className="col-2">
                        <h5 className="text-decoration-underline">Policies</h5>
                        <NavLink to="/" className="d-block text-decoration-none fg-black fs-sm">Terms & Conditions</NavLink>
                    </div>
                    <div className="col-6">
                        <div className="logo fs-2xl"><i className="fa-solid fa-people-roof"></i> Happy Family</div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit impedit, neque autem ab adipisci magni eligendi reiciendis maxime dicta optio. Commodi ipsum expedita beatae alias mollitia assumenda quas id? Ut?</p>
                    </div>
                </div>
            </div>
        </section>
    );
}