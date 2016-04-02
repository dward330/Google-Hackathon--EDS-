#import <UIKit/UIKit.h>

@interface VariableStore : NSObject
{
    
    
    
    
}
// message from which our instance is obtained
+ (VariableStore *)sharedInstance;


-(NSString*) getFName;
-(NSString*) getAddress;
-(NSString*) getLName;
-(NSString*) getEMail;
-(NSString*) getPNum;
-(NSString*) getZip;
-(NSString*) getLongitude;
-(NSString*) getLattitude;
-(NSString*) getHazard;
-(NSString*) getDescription;

-(UIImage*) getImage;


-(void) setFName: (NSString*)n;
-(void) setAddress: (NSString*)n;
-(void) setLName: (NSString*)n;
-(void) setEMail: (NSString*)n;
-(void) setPNum: (NSString*)n;
-(void) setZip: (NSString*)n;
-(void) setLongitude: (NSString*)n;
-(void) setLattitude: (NSString*)n;
-(void) setHazard: (NSString*)n;
-(void) setDescription: (NSString*)n;

-(void) setImage: (UIImage*)i;

@end