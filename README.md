EpesiRmaManager
===============

Return Material Authorization for Epesi CRM


This addon for Epesi CRM (http://www.epe.si) is done to manage returned goods, in warranty or not, to the seller.
It should have the following fields

- RMA ID code (auto generated)  (Calulated field, gets the ID from the id field)
- Customer (selected from CRM people/companies database)  (Select Field or multi Select?)
- Phone Number of the Customer (calculated based on the field above)
- Manufacturer  (selected from CRM companies database)  (another Select Field)
- Device sku (started as text field but probably it could be linked to other modules in order to retrieve goods)  (Need to know if we need to make another module right away please because I think link to another module will work best.)
- Device Model (in case of different device with same sku but different features) (text field??)
- Device Serial Number (Text Field)
- Date of Request (Date Field)
- Package Status (enumeration like: Complete, Incomplete, No Package, Damaged) (Common_Data Field)
- Package Description  (Long Text Field)
- Fault Declared from Customer (Long Text Field)
- Fault Revealed (Long Text Field)
- Status (Received Request, RMA Accepted, RMA Rejected, Item Received, Item sent to Manufacturer, Item Repaired, Item Returned) (Common_Data Field)
- Priority (Common_Data Field)
- Limit Date (Date Field)

And below these fields same sections: Notes, Emails ... and so on.
