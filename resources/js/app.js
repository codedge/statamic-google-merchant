import ConditionFieldtype from "./fieldtypes/conditionFieldtype";
import AvailabilityFieldtype from "./fieldtypes/availabilityFieldtype";
import PriceFieldtype from "./fieldtypes/priceFieldtype";

import SettingsComponent from "./components/SettingsComponent";

Statamic.booting(() => {
    // Fieldtypes
    Statamic.$components.register("condition-fieldtype", ConditionFieldtype);
    Statamic.$components.register(
        "availability-fieldtype",
        AvailabilityFieldtype
    );
    Statamic.$components.register("price-fieldtype", PriceFieldtype);

    // Components
    Statamic.$components.register("gm-settings", SettingsComponent);
});
