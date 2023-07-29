import IndexField from "./components/IndexField";
import DetailField from "./components/DetailField";
import FormField from "./components/FormField";

Nova.booting((app, store) => {
    app.component("index-gutentap", IndexField);
    app.component("detail-gutentap", DetailField);
    app.component("form-gutentap", FormField);
});
