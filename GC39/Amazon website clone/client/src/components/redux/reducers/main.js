import { getProductsreducer } from "./Productsreducer";
import {combineReducers} from "redux";

const rootreducers=combineReducers({
    getProductsdata:getProductsreducer
});

export default rootreducers;