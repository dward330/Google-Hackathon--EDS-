//
//  UserInfo.h
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "Summary.h"
#import "VariableStore.h"

@interface UserInfo : UIViewController {
    
}

-(IBAction)ReturnKeyButton:(id)sender;

- (IBAction)updateStuff:(UIButton *)sender;

@property (strong, nonatomic) IBOutlet UITextField *f_Name;
@property (strong, nonatomic) IBOutlet UITextField *l_Name;
@property (strong, nonatomic) IBOutlet UITextField *email_A;
@property (strong, nonatomic) IBOutlet UITextField *p_Num;
@property (strong, nonatomic) IBOutlet UITextField *zip_C;






@end
