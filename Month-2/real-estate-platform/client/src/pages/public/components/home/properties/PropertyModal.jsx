import { NavLink } from "react-router-dom";

export const PropertyModal = ({ setShowModal, property }) => {
    return (
        <div className="property-modal-container">
            <div className="property-modal">

                {/* Property Images */}
                <div id="carouselExampleDark" className="property-img carousel carousel-overlay slide" data-bs-theme="dark">
                    <button className="close-modal btn-solid theme-secondary position-absolute end-0 m-3" onClick={() => setShowModal(false)}><i className="fa-solid fa-close"></i></button>
                    
                    <div className="carousel-inner">
                        {property.images.map((ele) => {
                            return (<div key={ele.url} className="carousel-item" data-bs-interval="10000">
                                <a href={ele.url}><img src={ele.url} className="d-block w-100 rounded-5" alt={ele.alt} /></a>
                            </div>)
                        })}
                        <span className="status position-absolute top-0 start-0 mt-3 ms-3 fs-sm fw-bold bg-accent fg-white px-5 rounded-8">{property.status}</span>
                    </div>

                    <div className="carousel-overlay-controls">
                        <button className="btn-icon btn-sm btn-subtle theme-secondary" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span className="carousel-icon-prev" aria-hidden="true"></span>
                            <span className="visually-hidden">Previous</span>
                        </button>
                        <div className="carousel-indicators">
                            {property.images.map((ele, ind) => {
                                return <button key={ind} type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to={ind} className={ind == 0 ? "active" : ""} aria-current={ind == 0 && "true"} aria-label={`Slide ${ind + 1}`}></button>
                            })}
                        </div>
                        <button className="btn-icon btn-sm btn-subtle theme-secondary" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span className="carousel-icon-next" aria-hidden="true"></span>
                            <span className="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>




                <div className="details p-5">
                    <h5 className="name d-flex justify-content-between"><span>{property.name}</span> <span className="location fs-xs fg-secondary"><i className="fa-solid fa-location-dot"></i> {(property.location.address).slice(0, 50)}</span></h5>
                    <p className="fs-sm fg-secondary m-0 mb-3">{property.description}</p>
                    <span className="price fg-danger fs-sm fw-bold">{property.price.display + "  (" + property.listingType + ")"}</span>

                    <div className="highlights mt-4">
                        {property.highlights.map((ele, ind) => (<span key={ind} className="fs-xs fw-bold px-5 py-1 me-2 mb-2 rounded-2 d-inline-block fg-white bg-success">{ele}</span>))}
                    </div>

                    <div className="specifications mt-3">
                        {Object.keys(property.specifications).map((ele, ind) => {
                            let key = ele;
                            let value = property.specifications[ele];

                            if (ele == "area") key = "sq.ft";

                            return !!value && key != "areaUnit" && <span key={ind} className="fs-xs fw-bold px-5 py-1 me-1 mb-2 rounded-8 bg-secondary d-inline-block">{value} {key}</span>
                        })}


                    </div>
                    <div className="facilities mt-3">
                        {property.facilities.map((ele, ind) => (<span key={ind} className="fs-xs fw-bold px-5 py-1 me-1 mb-2 rounded-8 bg-inverse fg-white d-inline-block">{ele}</span>))}
                    </div>

                    <NavLink to={`/properties/${property.id}`} className="btn-solid theme-accent mt-10 fs-sm">Property Details</NavLink>
                </div>
            </div>
        </div>
    );
}