import "../../assets/styles/public-property-details.css";
import {useParams } from "react-router-dom";
import { properties } from "./components/home/properties/real_estate_properties_20";
import { useEffect, useState } from "react";

export const PropertyDetails = () => {
    useEffect(() => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    }, []);

    let { id } = useParams();
    let [property, setProperty] = useState({});

    let [activeImg, setActiveImg] = useState(0);
    let [tab, setTab] = useState("highlights");

    useEffect(() => {
        properties.map((ele) => {
            if (ele.id == id) {
                setProperty(ele);
                return;
            }
        });
    }, []);

    return (
        <section className="px-4 sm:px-12">
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>


            <div className="public-property-details">
                <div className="row pb-12">
                    <div className="col-7">
                        <div className="property-images row">
                            <div className="col-2 p-0">
                                <div className="side-images d-flex flex-column gap-2">
                                    {!!property.images && property.images.map((ele, ind) => (
                                        <img onClick={() => { setActiveImg(ind) }} src={ele.url} key={ele.url} className={`border border-2 p-1 rounded-4 ${activeImg == ind ? "active" : ""}`} />
                                    ))}
                                </div>
                            </div>
                            <div className="col-10">
                                <div className="main-images position-relative">

                                    <button className="save-btn position-absolute top-0 end-0 bg-transparent border-0 mt-4 me-4">
                                        <i className="fa-regular fa-heart fs-xl"></i>
                                        <i className="fa-solid fa-heart fs-xl fg-danger"></i>
                                    </button>

                                    {!!property.images && property.images.map((ele, ind) => (
                                        <a href={ele.url} key={ele.url}><img src={ele.url} className={`p-1 rounded-4 ${activeImg == ind ? "active" : ""}`} /></a>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="col-5 px-12 pt-5">
                        <h3 className="name">{property.name && property.name}</h3>
                        <span className="location fs-sm fg-secondary"><i className="fa-solid fa-location-dot"></i> {!!property.location && (property.location.address).slice(0, 50)}</span>
                        <p className="mt-4">{property.description && property.description}</p>

                        <div className="price fw-bold">
                            <span className="d-block fs-sm fg-danger">Price</span>
                            <span className="d-block fs-md fg-danger">Rs. {!!property.price && property.price.amount}</span>
                        </div>



                        <div className="row mt-10">
                            {!!property.schemeName && <>
                                <h5 className="col-5">Scheme Name</h5>
                                <div className="col-2">:</div>
                                <span className="col-5 fs-md">{property.schemeName}</span>
                            </>}

                            {!!property.developer && <>
                                <h5 className="col-5">Developer</h5>
                                <div className="col-2">:</div>
                                <span className="col-5 fs-md">{property.developer}</span>
                            </>}

                            {!!property.propertyType && <>
                                <h5 className="col-5">Property Type</h5>
                                <div className="col-2">:</div>
                                <span className="col-5 fs-md">{property.propertyType}</span>
                            </>}

                            {!!property.status && <>
                                <h5 className="col-5">Property Status</h5>
                                <div className="col-2">:</div>
                                <span className="col-5 fs-md">{property.status}</span>
                            </>}

                            {!!property.possessionYear && <>
                                <h5 className="col-5">Possession Year</h5>
                                <div className="col-2">:</div>
                                <span className="col-5 fs-md">{property.possessionYear}</span>
                            </>}

                            {!!property.yearBuilt && <>
                                <h5 className="col-5">Year Built</h5>
                                <div className="col-2">:</div>
                                <span className="col-5 fs-md">{property.yearBuilt}</span>
                            </>}
                        </div>
                    </div>
                </div>



                <div className="more-details mt-12 p-10 rounded-5">
                    <div className="tabs">
                        <button className={`px-5 py-1 me-3 ${tab == "highlights" ? "active" : ""}`} onClick={() => setTab("highlights")}>Highlights</button>
                        <button className={`px-5 py-1 me-3 ${tab == "specifications" ? "active" : ""}`} onClick={() => setTab("specifications")}>Specifications</button>
                        <button className={`px-5 py-1 me-3 ${tab == "facilities" ? "active" : ""}`} onClick={() => setTab("facilities")}>Facilities</button>
                        <button className={`px-5 py-1 me-3 ${tab == "agent" ? "active" : ""}`} onClick={() => setTab("agent")}>Agent Details</button>
                    </div>

                    <div className="mt-10">
                        {tab == "highlights" && <div className="highlights row m-0">
                            {!!property.highlights && property.highlights.map((ele) => {
                                return <div className="col-12 border p-3 rounded-3">{ele}</div>
                            })}
                        </div>}

                        {tab == "facilities" && <div className="facilities row m-0">
                            {!!property.facilities && property.facilities.map((ele) => {
                                return <div className="col-12 border p-3 rounded-3">{ele}</div>
                            })}
                        </div>}

                        {tab == "specifications" && <div className="specifications row m-0">
                            {!!property.specifications && Object.keys(property.specifications).map((ele) => (<>
                                <div className="col-3 fg-danger border p-3 rounded-3">{ele}</div>
                                <div className="col-4 border p-3 rounded-3">{property.specifications[ele]}</div>
                                <div className="col-5"></div>
                            </>)
                            )}
                        </div>}

                        {tab == "agent" && <div className="agent row m-0">
                            {!!property.agent && Object.keys(property.agent).map((ele) => (<>
                                <div className="col-3 fg-danger border p-3 rounded-3">{ele}</div>
                                <div className="col-4 border p-3 rounded-3">{property.agent[ele]}</div>
                                <div className="col-5"></div>
                            </>)
                            )}
                        </div>}
                    </div>
                </div>
            </div>
        </section >
    );
}