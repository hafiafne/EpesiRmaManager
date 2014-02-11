EpesiRmaManager
===============

Return Material Authorization for Epesi CRM


This addon for Epesi CRM (http://www.epe.si) is done to manage returned goods, in warranty or not, to the seller.
It should have the following fields

- RMA ID code (auto generated)
- Customer (selected from CRM people/companies database)
- Phone Number of the Customer
- Manufacturer  (selected from CRM companies database)
- Device sku (started as text field but probably it could be linked to other modules in order to retrieve goods)
- Device Model (in case of different device with same sku but different features)
- Device Serial Number
- Date of Request
- Package Status (enumeration like: Complete, Incomplete, No Package, Damaged)
- Package Description
- Fault Declared from Customer
- Fault Revealed
- Status (Received Request, RMA Accepted, RMA Rejected, Item Received, Item sent to Manufacturer, Item Repaired, Item Returned)
- Priority
- Limit Date

And below these fields same sections: Notes, Emails ... and so on.
