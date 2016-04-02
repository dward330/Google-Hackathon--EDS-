#import "VariableStore.h"

NSString *fName;
NSString *address;
NSString *lName;
NSString *eMail;
NSString *pNum;
NSString *zip;
NSString *longitude;
NSString *lattitude;
NSString *hazard;
NSString *description;

UIImage *image;


@implementation VariableStore
+ (VariableStore *)sharedInstance
{
    
    // the instance of this class is stored here
    static VariableStore *myInstance = nil;
    // check to see if an instance already exists
    if (nil == myInstance) {
        myInstance  = [[[self class] alloc] init];
        
        fName = @"First Name";
        address = @"Address";
        lName = @"Last Name";
        eMail = @"E-Mail Address";
        pNum = @"Phone Number";
        zip = @"Zip Code";
        longitude = @"0.00";
        lattitude = @"0.00";
        hazard = @"hazard";
        description = @"description here";
        image = [UIImage imageNamed: @"IMG_0435.PNG"];
        
        // initialize variables here
    }
    // return the instance of this class
    return myInstance;
    
}

-(NSString*) getFName{
    return fName;
}

-(NSString*) getAddress{
    return address;
}



-(NSString*) getLName{
    return lName;
}

-(NSString*) getEMail{
    return eMail;
}

-(NSString*) getPNum{
    return pNum;
}

-(NSString*) getZip{
    return zip;
}

-(NSString*) getLongitude{
    return longitude;
}

-(NSString*) getLattitude{
    return lattitude;
}

-(NSString*) getHazard{
    return hazard;
}

-(NSString*) getDescription{
    return description;
}

-(UIImage*) getImage{
    return image;
}




-(void) setFName: (NSString*) n{
    fName = n;
}

-(void) setAddress:(NSString*) n{
    address = n;
}


-(void) setLName: (NSString*) n{
    lName = n;
}

-(void) setEMail: (NSString*) n{
    eMail = n;
}

-(void) setPNum: (NSString*) n{
    pNum = n;
}

-(void) setZip: (NSString*) n{
    zip = n;
}

-(void) setLongitude: (NSString*) n{
    longitude = n;
}

-(void) setLattitude: (NSString*) n{
    lattitude = n;
}

-(void) setHazard: (NSString*) n{
    hazard = n;
}

-(void) setDescription: (NSString*) n{
    description = n;
}

-(void) setImage: (UIImage*) i{
    image = i;
}



@end
