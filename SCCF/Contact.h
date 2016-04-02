//
//  Contact.h
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import <UIKit/UIKit.h>
#import<MessageUI/MFMailComposeViewController.h>



@interface Contact :UIViewController <MFMailComposeViewControllerDelegate>  {
}
- (IBAction)link;
- (IBAction)link2;
- (IBAction)link3;
-(IBAction)MakePhoneCall:(id)sender;
-(IBAction)email;

@end

