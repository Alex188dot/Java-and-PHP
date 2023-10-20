module com.example.demo {
    requires javafx.controls;
    requires javafx.fxml;

    requires org.controlsfx.controls;
    requires org.kordamp.bootstrapfx.core;
    requires java.sql;

    opens com.example.demo.controller to javafx.fxml;
    exports com.example.demo.controller;
    exports CF;
    opens CF to javafx.fxml;
}