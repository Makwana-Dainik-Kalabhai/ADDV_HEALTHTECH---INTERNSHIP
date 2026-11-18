import { useState } from "react";
import { NavLink } from "react-router-dom";
import { PropertyModal } from "../home/properties/PropertyModal";

export const PropertyCard = ({ property }) => {
    let [showModal, setShowModal] = useState(false);
    let [modalData, setModalData] = useState({});

    return (
        <>
            <div className="col-6 lg:col-4 mb-3">
                <div className="card h-100 shadow-lg overflow-hidden p-2">
                    <img onClick={() => { setShowModal(true); setModalData(property) }} src={!!property.images[0].url && property.images[0].url} alt={!!property.images[0].alt && property.images[0].alt} className="rounded-4" />

                    <div onClick={() => { setShowModal(true); setModalData(property) }} className="details px-5 py-3 pb-12 position-relative h-100">
                        {!!property.name && <h6 className="name fg-danger">{property.name}</h6>}
                        {!!property.description && <p className="fs-xs m-0">{property.description.slice(0, 70) + "..."}</p>}

                        {!!property.specifications && <div className="specifications my-4">
                            {Object.keys(property.specifications).map((ele, ind) => {
                                if (ind > 3) return;
                                return !!property.specifications[ele] > 0 && <span className="px-4 py-1 me-2 d-inline-block mb-2 bg-secondary rounded-8 fs-xs">{property.specifications[ele]} {ele}</span>
                            })}
                        </div>}
                    </div>



                    <div className="price-and-view position-absolute start-0 bottom-0 row px-5 py-3 w-100 align-items-center">
                        {!!property.price.amount && <div onClick={() => { setShowModal(true); setModalData(property) }} className="col-7">
                            <div className="price">
                                <span className="d-block fs-xs fg-danger">Price</span>
                                <span className="d-block fs-sm">Rs.{property.price.amount}</span>
                            </div>
                        </div>}

                        <div className="col-5">
                            <NavLink to={`/properties/${property.id}`} className="fs-xs btn-solid theme-accent">View Details</NavLink>
                        </div>
                    </div>
                </div>
            </div>

            {showModal && <PropertyModal setShowModal={setShowModal} property={modalData} />}
        </>
    );
}