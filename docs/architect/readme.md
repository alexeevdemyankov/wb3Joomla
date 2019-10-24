# Architect guide

This is guide for database architect and administrators.

All guide contain examples for resolve different tasks.



## Example1:

> > ***Task:***

> > >Add table for edit in system.

> > ***Description:***

> > > For example we have table width description of something goods (id/name/desc)

> > ***Solution:****
> > > - go to CONSTRUCTOR - SCHEME GROUPS 
> > > - CREATE new record for example SHOP
> > > - press on LINKS button on SHOP row and select SCHEMS
> > > - CREATE new SCHEME for example GOODS 
> > > - press on LINKS button on GOODS row and select SCHEME FIELDS
> > > -  CREATE fields records (if Database of table the same stay it empty). Select table, field, key check, view, add,edit, enter name and save it. You should do it for all fields.
> > > - Now add in CONSTRUCTOR-MENU LINKS 	index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=(HERE ID OF SCHEME ROW)
> > > - go to SYSTEM-USER GROUPS - add group menu record with your link.
> > > - go back and add in SCHEME RIGHTS your sheme
> > > - now user can edit database table
