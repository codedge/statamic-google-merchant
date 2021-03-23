import ConditionFieldtype from "./fieldtypes/conditionFieldtype";
import AvailabilityFieldtype from "./fieldtypes/availabilityFieldtype";
import PriceFieldtype from "./fieldtypes/priceFieldtype";

Statamic.booting(() => {
    Statamic.$components.register("condition-fieldtype", ConditionFieldtype);
    Statamic.$components.register(
        "availability-fieldtype",
        AvailabilityFieldtype
    );
    Statamic.$components.register("price-fieldtype", PriceFieldtype);
});
